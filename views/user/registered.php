<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="ru-RU">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru-RU">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Прогнозы на спорт от true-bet.ru &rsaquo; Регистрационная форма</title>
    <link rel='stylesheet' id='buttons-css'  href='/css/buttons.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='open-sans-css'  href='/css/Clatinext.css' media='all' />
    <link rel='stylesheet' id='dashicons-css'  href='/css/dashicons.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='login-css'  href='/css/login.min.css' type='text/css' media='all' />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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
<body class="login login-action-register wp-core-ui  locale-ru-ru">


<div id="login">

    <h1><a href="http://bbet.pro/" title="Прогнозы на спорт от bbet.pro" tabindex="-1">Прогнозы на спорт от bbet.pro</a></h1>

    <p class="" id="check-email">Проверьте вашу электронную почту</p>

    <p class="message register">Зарегистрироваться на этом сайте</p>

    <?php if(isset($errors) && is_array($errors)): ?>
        <?php foreach($errors as $error): ?>
            <p class="message register register-error"><b>Ошибка:</b> <?php echo $error; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form name="registerform" id="registerform" action="" method="post" novalidate="novalidate" onsubmit="checkErrors()">
        <p>
            <label for="user_login">Имя пользователя<br />
                <input type="text" name="user_login" id="user_login" class="input" value="" size="20" /></label>
        </p>
        <p>
            <label for="user_email">E-mail<br />
                <input type="email" name="user_email" id="user_email" class="input" value="" size="25" /></label>
        </p>
        <p id="reg_passmail">Пароль будет отправлен вам на e-mail.</p>
        <br class="clear" />
        <input type="hidden" name="redirect_to" value="" />
        <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Регистрация" /></p>
    </form>

    <p id="nav">
        <a href="/user/login">Войти</a> |
        <a href="/developing" title="Восстановление пароля">Забыли пароль?</a>
    </p>

    <p id="backtoblog"><a href="/" title="Потерялись?">&larr; Назад к сайту &laquo;Прогнозы на спорт от true-bet.pro&raquo;</a></p>

</div>

<script type="text/javascript">



</script>




<div class="clear"></div>
</body>
</html>