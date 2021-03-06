<?php 
session_start();
require_once("dbconnect.php");
if(!isset($_SESSION["id"])):
	header("location:login.php");
else:
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Добавление записи</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				"use strict";
        //================ Проверка email ==================

        //регулярное выражение для проверки email
        var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
        var mail = $('input[name=email]');

        mail.blur(function(){
        	if(mail.val() != ''){

                // Проверяем, если введенный email соответствует регулярному выражению
                if(mail.val().search(pattern) == 0){
                    // Убираем сообщение об ошибке
                    $('#valid_email_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                  }else{
                    //Выводим сообщение об ошибке
                    $('#valid_email_message').text('Не правильный Email');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);
                  }
                }else{
                	$('#valid_email_message').text('Введите Ваш email');
                }
              });

        //================ Проверка длины пароля ==================
        var password = $('input[name=password]');

        password.blur(function(){
        	if(password.val() != ''){

                //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                if(password.val().length < 6){
                    //Выводим сообщение об ошибке
                    $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                    // Дезактивируем кнопку отправки
                    $('input[type=submit]').attr('disabled', true);

                  }else{
                    // Убираем сообщение об ошибке
                    $('#valid_password_message').text('');

                    //Активируем кнопку отправки
                    $('input[type=submit]').attr('disabled', false);
                  }
                }else{
                	$('#valid_password_message').text('Введите пароль');
                }
              });
      });
    </script>
    <style>
    a{
    	cursor: default;
    }
  </style>
</head>
<body>
	<div id="form">
		<form action="action.php" method="POST">
			<h2>Добавить поставщика</h2>
			<div class="form-item">
				<p class="formLabel">Провайдер</p>
				<input type="text" name="provider_name" id="provider_name" required="required"class="form-style"/>
			</div>
			<div class="form-item">
				<p class="formLabel">Представитель</p>
				<input type="text" name="provider_agent" id="provider_agent" required="required"  class="form-style"/>
			</div>
			<div class="form-item">
				<p class="formLabel">Номер телефона</p>
				<input type="tel" name="provider_phone" id="provider_phone" required="required"  class="form-style"/>
			</div>
			<div class="form-item">
				<p class="formLabel">Адрес</p>
				<input type="text" name="provider_address" id="provider_address" required="required"  class="form-style"/>
			</div>
			<div class="form-item">
				<p class="formLabel">Email</p>
				<input type="email" name="provider_e_mail" id="provider_e_mail required="required"  class="form-style"/>
			</div>
			<input type="submit" value=" Добавить " class="btn" name="inser_provider" />
			<a href="workers.php" class="return">Отмена</a>
			<!-- <a href="workers.php" class="return">На главную</a><br> -->
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			var formInputs = $('input[type="email"],input[type="password"],input[type="text"],input[type="tel"]');
			formInputs.focus(function() {
				$(this).parent().children('p.formLabel').addClass('formTop');
				$('div#formWrapper').addClass('darken-bg');
				$('div.logo').addClass('logo-active');
			});
			formInputs.focusout(function() {
				if ($.trim($(this).val()).length == 0){
					$(this).parent().children('p.formLabel').removeClass('formTop');
				}
				$('div#formWrapper').removeClass('darken-bg');
				$('div.logo').removeClass('logo-active');
			});
			$('p.formLabel').click(function(){
				$(this).parent().children('.form-style').focus();
			});
		});
	</script>

</body>
</html>
<?php endif; ?>