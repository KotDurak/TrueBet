<?php


class UserController
{
    public function actionRegister()
    {
       $name = '';
       $email = '';
       $password = '';
       $result = false;

        if(isset($_POST['wp-submit'])){
            $name = $_POST['user_login'];
            $name = trim($name);
            $email = $_POST['user_email'];

            $errors = false;

            if(!User::checkName($name)){
                $errors[] = 'Некорректное имя';
            }

            if(!User::checkEmail($email)){
                $errors[] = 'Некорректный адрес электронной почты';
            }

            if(!User::checkCorrectSymbols($name)){
                $errors[] = 'Это имя пользователя некорректно, поскольку оно содержит недопустимые символы. Пожалуйста
                введите корректное имя пользователя';
            }

            if(User::checkEmailExists($email)){
                $errors[] = 'Этот email уже зарегистрирован, пожалуйста введите другой';
            }

            if($errors == false){
                $result = User::register($name,$email);
                require_once ROOT . '/views/user/registered.php';
                true;
            }
        }



        require_once ROOT . '/views/user/register.php';
        return true;
    }

    public static function actionLogin()
    {
        $login = false;
        $password = false;



        if(isset($_POST['wp-submit'])){
            $login = $_POST['log'];
            $password = $_POST['pwd'];

            if (isset($_POST['rememberme'])){
               setcookie("login",$login,time()+3600*24*10,"/");
               setcookie("password",$password, time()+3600*24*10,"/");


            } else{
                setcookie("login","",0,"/");
                setcookie("password","",0,"/");
            }

            $errors = false;

          $userId =   User::checkUserData($login,$password);

          if($userId == false) {
              $errors = 'Введен неверный логин или пароль';
          } else {
              User::auth($userId);
              header("Location: /cabinet");
          }

        }

        require_once ROOT . '/views/user/login.php';
       return true;
    }
    public  function actionRecovery()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if(isset($_POST['email'])){
           $email = $_POST['email'];

           if (!$email){
               $errors = 'Введите адрес электронной почты';
           }
        }


        User::recovery($email);
        require_once ROOT . '/views/develop/index.php';
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }


}