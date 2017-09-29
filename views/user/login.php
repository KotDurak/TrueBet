
<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="ru-RU">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru-RU">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Прогнозы на спорт от bbet.pro &rsaquo; Войти</title>

    <?php require_once  ROOT . '/views/layouts/login_links.php';?>

    <style type="text/css">
        #login h1 a {
            background-image:url(/wp-content/uploads/2015/08/logo.png) !important;
            width: 100px;
            height: 120px;
            -webkit-background-size: 100px 120px;
            background-size: 100px 120px;
        }
    </style>
    <meta name='robots' content='noindex,follow' />
</head>
<body class="login login-action-login wp-core-ui  locale-ru-ru">
<div id="login">
    <h1><a href="http://bbet.pro/" title="Прогнозы на спорт от bbet.pro" tabindex="-1">Прогнозы на спорт от bbet.pro</a></h1>

    <form name="loginform" id="loginform" action="" method="post">
        <p>
            <label for="user_login">Имя пользователя<br />
                <input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
        </p>
        <p>
            <label for="user_pass">Пароль<br />
                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
        </p>
        <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> Запомнить меня</label></p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Войти" />
            <input type="hidden" name="redirect_to" value="http://bbet.pro/prognozy" />
            <input type="hidden" name="testcookie" value="1" />
        </p>
    </form>

    <p id="nav">
        <a href="/user/register">Регистрация</a> | 	<a href="/developing" title="Восстановление пароля">Забыли пароль?</a>
    </p>

    <script type="text/javascript">
        function wp_attempt_focus(){
            setTimeout( function(){ try{
                d = document.getElementById('user_login');
                d.focus();
                d.select();
            } catch(e){}
            }, 200);
        }

        wp_attempt_focus();
        if(typeof wpOnload=='function')wpOnload();
    </script>

    <p id="backtoblog"><a href="/" title="Потерялись?">&larr; Назад к сайту &laquo;Прогнозы на спорт от true-bet.pro&raquo;</a></p>

</div>


<div class="clear"></div>
</body>
</html>
