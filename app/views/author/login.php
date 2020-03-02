<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/assets/css/form.css">
    </head>
    <script type="text/javascript" >
        $(document).ready(function () {
            $('.message a').click(function () {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });

            var files; // переменная. будет содержать данные файлов
            // заполняем переменную данными, при изменении значения поля file 
            $('input[type=file]').on('change', function () {
                files = this.files[0];
                alert('ok');
            });
            $('form.register-form').submit(function (event) {
                event.stopPropagation(); // Остановка происходящего
                event.preventDefault();  // Полная остановка происходящего
                // Содадим данные формы и добавим в них данные файлов из files
                var data = new FormData(this);
                data.append('photo', files);
                data.append('my_file_upload', 1);
                // Отправляем запрос
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    cache: false,
                    processData: false, // Не обрабатываем файлы (Don't process the files)
                    contentType: false, // Так jQuery скажет серверу что это строковой запрос
                    success: function (result) {
                        alert(result);
                    },
                });
            });
            $('#log').click(function () {
                //alert('login');
                var email = $('input[name=name]').val();
                var password = $('input[name=pass]').val();
                //alert(email+'/'+password);
                //	var data = name;
                event.preventDefault();  // Полная остановка происходящего
                $.ajax({
                    url: 'logincheck',
                    type: 'POST',
                    dataType: 'json',
                    data: "email=" + email + "&password=" + password,
                    cache: false,
                    processData: false, // Не обрабатываем файлы (Don't process the files)
                    //		contentType: false, // Так jQuery скажет серверу что это строковой запрос
                    success: function (result) {
                        $('#result').html(result);
                    },
                });
            })
        });
    </script>

    <div class="login-page">
	<div class="form">
	    <form class="register-form" action="create" method="POST">
		<label for="fname">Введите свое имя</label>
		<input type="text" name="fname"/>
		<label for="sname">Введите свое фамилие</label>
		<input type="text" name="sname"/>
		<label for="email">Заполните ваш email</label>
		<input type="email" name="email"/>
		<label for="password">Создайте пароль</label>
		<input type="password" name="password"/>
		<label for="avatar">выберите аватарку</label>
		<input type="file" name="avatar" />
		<input type="submit">
		<p class="message">Already registered? <a href="#">Sign In</a></p>
	    </form>
	    <form class="login-form" action="logincheck" method="POST">
		<input type="email" placeholder="email" name="name"/>
		<input type="password" placeholder="password" name ="pass"/>
		<button id="log">login</button>
		<p class="message">Not registered? <a href="#">Create an account</a></p>
	    </form>
	    <div id="result"></div>
	    <div><a href="/">Главная страница </a></div>
	</div>
    </div>

    <?php
//print_r($_POST);
    ?>

