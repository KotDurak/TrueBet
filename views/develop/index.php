<?php require_once ROOT . '/views/layouts/header.php';?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Востоновление пароля</title>
</head>
<body>

<div class="block">
	<span class="pas">
		<p>Восстановление пароля</p>
	</span>

	<form action="/recovery" method="POST" >
        <?php if(isset($errors) && $errors != null): ?>
            <p><?php print($errors); ?></p>
        <?php else: ?>
            <p>Ваш новый пароль отправлен вам на адрес электронной почты</p>
        <?php endif; ?>
	<span>
		<label for="email">Введите свой email :<br>
		<input type="text" name="email" id="email" size="20"></label>
		</span>
		<br><input type="submit" value="Отправить" name="">
	</form>
	<div class="buttons">
		<a href="http://true-bet.ru/" class="bl">Вернуться на сайт</a>
		<a href="http://true-bet.ru/user/register" class="br">Зарегестрироваться</a>
	</div>
	</div>
<style>
body{
	background: url(../../img/main_bg2.jpg);
	background-repeat: no-repeat;
	
}
.buttons{
	width: 223px;
	height: 50px;
	margin: 0 auto;
}
.buttons a{
	box-shadow: 4px 4px 0 0;
	color: #808080;
	font-size: 11px;
	line-height: 25px;
	text-align: center;
}
.bl{
	display: block;
	width: 109px;
	height: 30px;
	background: #fff;
	float: left;
	border-radius:0 0 0 10px;
	color: black; 
}
.br{
	display: block;
	width: 109px;
	height: 30px;
	background: #fff;
	float: right;
	color: black;
    border-radius:0 0 10px 0; 
}
.block{
	position: absolute;
	left: 40%;
	top: 30%;
	transform: scale(1.55);
	height: 200px;
	
	padding:0 24px 0 24px;
}
.pas{
	
	display: block;
	width: 175px;
	height: 50px;
	margin:0 auto;
	background-color: #fff;
	border-radius: 10px 10px 0 0;
	padding:0 24px 0 24px;
	box-shadow: 4px 4px 0 0;
}
.pas p{
	color: black;
	font-size: 14px;
	text-align: center;
	line-height: 50px;
}
	form{
		box-shadow: 4px 4px 0 0;
		margin: 0 auto;
		display: block;
		width: 175px;
		margin-top: 15px;margin-bottom: 15px;
		padding:26px 24px 16px;
		font-weight: 400;
		overflow: hidden;
		background-color: #fff;
	}
	input[type="text"]{
		margin-bottom: 25px;
		border:2px solid black;
		color: black
		
	}
	input[type="submit"]{
		float: right;
	}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="common.js"></script>
</body>
</html>
<?php require_once  ROOT . '/views/layouts/footer.php';?>
