<?php


class User
{
    public  static function checkName($name)
    {
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }

    public static function checkCorrectSymbols($name)
    {
        if(!preg_match('/[\W]+/',$name)){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }



    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql ='SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn()){
            return true;
        }
        return false;

    }

    /**
     * @return password
     */
    public static function setPassword()
    {
        // Символы, которые будут использоваться в пароле.
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";

        $max = 10;

        $size = strlen($chars) -1;
        $password = null;

        while($max--){
            $password .= $chars[rand(0,$size)];
        }

        return $password;
    }

    public static function sendPasswordToUser($name, $email,$password)
    {
        $subject = "[Прогнозы на спорт от true-bet.ru] Ваше имя пользователя и пароль";
        $headers = "Content-type: text/html; charset=utf-8\r\n";

            $message = " Имя пользователя: {$name}  <br>
                     Пароль: {$password}
                       <br> <a href='http://true-bet.ru/user/login'>truebet</a>";


        $result = mail($email, $subject,$message,$headers);

    }

    public static function register($name,$email)
    {
        $password = self::setPassword();

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name,email,password) 
                     VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);

        self::sendPasswordToUser($name, $email, $password);

        return $result->execute();

    }

    public static function recovery($email)
    {
        $password = self::setPassword();
        $db = Db::getConnection();

        $sql  = 'UPDATE user SET password = :password WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $done =  $result->execute();

        $sql = 'SELECT `name` FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email,PDO::PARAM_STR);
        $result->execute();
        $userData =  $result->fetch();
        $name = $userData['name'];

        self::sendPasswordToUser($name, $email,$password);

        return $done;

    }


    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE (email = :login AND password = :password) OR 
                     (name = :login AND password = :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':login',$login,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if($user){
            return $user['id'];
        }
        return false;

    }

    public static function getUserById($id)
    {
        if($id){
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id',$id,PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();

        }
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if(isset($_SESSION['user'])){
            return false;
        }

        return true;
    }

}