<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/assets/css/form.css">
	<script type="text/javascript" src="/assets/js/tinymce/tiny_mce.js"></script>

	<script type="text/javascript" src="/assets/js/tinymce/tinymce_settings.js"></script>

    </head>

    <script type="text/javascript" >
        $(document).ready(function () {

//            var file; // переменная. будет содержать данные файлов
//            // заполняем переменную данными, при изменении значения поля file 
//	    $('input[type=file]').on('change', function(){
//		file = this.files[0];
//		//alert('ok');
//		});

            $('form').submit(function (event) {
                event.stopPropagation(); // Остановка происходящего
                event.preventDefault();  // Полная остановка происходящего
		   // Получаем данные формы путем созд объекта FormData
                var data = new FormData(this);
                // Отправляем запрос
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    cache: false,
                    processData: false, // Не обрабатываем файлы (Don't process the files)
                    contentType: false, // Так jQuery НЕ скажет серверу что это строковой запрос
                    success: function (result) {
                        alert(result);
                    },
                });
            });
        });
    </script>

    <form  action="add_new" method="POST">
	<fieldset class="form-group">
	    <label for="title"> Заголовок новости</label>
	    <input type="text" name="title" id="title" required="required"/>
	    <label for="annonce"> Анонс новости</label>
	    <textarea name="annonce" id="annonce" cols="1000" rows="2" required="required"></textarea>
	    <label for="rubric">Выбор рубрики</label>
	    <select name="rubric" id="rubric" multiple size="8">
		<?php foreach ($result as $key => $value): ?>
    		<optgroup label="<?= ($value['title']); ?>">
			<?php foreach ($value['childs'] as $titre): ?>
			    <option value="<?=($titre['title']); ?>">
				<?= ($titre['title']); ?>
			    </option>
			<?php endforeach; ?>
    		</optgroup>
		<?php endforeach; ?>
	    </select>
	    <p></p>
	    <div>
		<textarea name="content" id="content" cols="1000" rows="6" required="required" placeholder="Поле для новости"> </textarea></div>
	    <div><input type="submit" ></div>
	</fieldset>
    </form>

    <?php //debug($result); ?>

    <div id="result"></div>
    <div><a href="/">Главная страница </a></div>



