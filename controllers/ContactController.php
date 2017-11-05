<?php


class ContactController
{
    public  function actionIndex()
    {
        $userEmail = '';
        $userName = '';
        $userMessage = '';
        $userSubject = '';
        $result = false;



        if(isset($_POST['submit'])){
            $userEmail = $_POST['your-email'];
            $userName = $_POST['your-name'];
            $userMessage = $_POST['your-message'];
          //  $userSubject = $_POST['your-subject'];

           $errors = false;

           if(!User::checkEmail($userEmail)){
               $errors[] = 'Некорректный E-mail';
           }

           if(!User::checkName($userName)){
               $errors[] = 'Некорректное имя';
           }

            if(isset($_POST['g-recaptcha-response'])  && $_POST['g-recaptcha-response']){
                $secret = '6Ldu9DQUAAAAAOeOmbmAVmOBpqBLDKtXJo0gb3JA';
                $ip = $_SERVER['REMOTE_ADDR'];
                $response = $_POST['g-recaptcha-response'];
                $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
                $arr = json_decode($rsp, true);


            } else {
                $errors[] = 'Подтвердите что вы не робот';
            }

           if($errors == false) {
               $properties = include_once (ROOT . '/config/properties.php');
                $adminEmail = $properties['adminEmail'];
                $userMessage = "Text: {$userMessage}. From {$userEmail}";
               /* if($userSubject == '') {
                    $userSubject = 'Сообщение от пользователя';
                }*/
               $userSubject = "Письмо клиента с сайта http://true-bet.ru";

                $result = mail($adminEmail, $userSubject,$userMessage );
                $result = true;


           }

        }

        require_once ROOT . '/views/contact/index.php';
        return true;


    }



}