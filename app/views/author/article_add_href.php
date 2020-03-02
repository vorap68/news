<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/assets/css/form.css">
    </head>
    <script type="text/javascript" >
        $(document).ready(function () {

            var file; // переменная. будет содержать данные файлов
            // заполняем переменную данными, при изменении значения поля file 
            $('input[type=file]').on('change', function () {
                file = this.files[0];
                //alert('ok');
            });
            $('a#choice').click(function () {
                //alert('choice');
                event.preventDefault();
                var choi = 'choichoi';
            });

            $('form').submit(function (event) {
                event.stopPropagation(); // Остановка происходящего
                event.preventDefault(); // Полная остановка происходящего
                // Содадим данные формы и добавим в них данные файлов из files
                var data = new FormData(this);
                data.append('new', file);
                data.append('my_file_upload', 1);
                // Отправляем запрос
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    //dataType: 'json',
                    data: data,
                    cache: false,
                    processData: false, // Не обрабатываем файлы (Don't process the files)
                    contentType: false, // Так jQuery скажет серверу что это строковой запрос
                    success: function (result) {
                        alert(result);
                    },
                });
            });
            $(".category").dcAccordion();

        });
    </script>


    <form  action="add_new" method="POST">
	<fieldset class="form-group">
	    <label for="name">Введите свое имя и фамилию</label>
	    <input type="text" name="name" id="name" required="required"/>
	  <label for="title">Введите заголовок новости</label>
	    <input type="text" name="title" id="title" required="required"/>
	    <label for="annonce">Введите анонс новости</label>
	    <textarea name="annonce" id="annonce" cols="1000" rows="6" required="required"></textarea>
	    <label for="rubric">Выберите рубрику</label> 
	    <?php //foreach ($result as $key => $value): ?>
    	    <div style="border: solid  #c0c0c0;">
    		<ul style="magrin-left:10px; list-style-type:none; background-color: #f8f8f8;" class="category">
			<?php //echo  $value['title']; ?>
		    <?php print_r($result);?>

    		</ul></div>
	    <?php //endforeach; ?>
	    <label for="new">выберите статью</label>
	    <input type="file" name="new" />
	    <div><input type="submit"></div>
	</fieldset>
    </form>

    <?php //print_r($result);?>

    <div id="result"></div>
    <div><a href="/">Главная страница </a></div>