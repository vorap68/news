<!DOCTYPE html>
<html>
    <head lang="en">
	<meta charset="UTF-8">
	<title></title>
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<script  type="text/javascript" src="/assets/js/jquery-3.4.1.js"></script>    

	<script type="text/javascript">
            $(document).ready(function () {
		$('span.linkin').hover(function(){
	    $(event.target).css( "background", "green" );
	},function(){
	   $(event.target).css( "background", "" ); 
	});
                $('span.linkin').on("click", function (event) {
                    var id = $(event.target).attr('name');
                    //alert(id);
		    // здесь  добавляется новый эл форма с нужными сво-ми и полями и сразу (.submit() )отправляет 
		    // поле input со знач val(id)) в вызываемый скрипт  news/one
                    $('<form action="one" method="POST"/>')
        .append($('<input type="hidden" name="id">').val(id))
        .appendTo($(document.body)) //it has to be added somewhere into the <body>
        .submit();
});
                });

            

	</script>
    </head>
    <body>
	<?php foreach ($result as $key => $value): ?>
    	<hr>
    	<div class="container" >



    	  
    	    <div class="row border">
    		<div class="col-sm-2 bg-secondary text-center">название статьи: </div> 
    		<div class="col-sm-3 mr-auto"> <span  ><?= $value['title']; ?></span>
    		</div>
    	    </div>
    	    <div class="row border">
    		<div class="col-sm-2 bg-secondary text-center">анонс статьи: </div> 
    		<div class="col-sm-3 mr-auto"> <span  ><?= $value['annonce']; ?></span>
    		</div>
    	    </div>
    	    <div class="row border">
    		<div class="col-sm-2 bg-secondary text-center">категория:</div> 
    		<div class="col-sm-3 mr-auto"> <span  > <?= $value['rubric']; ?></span>
    		</div>
    	    </div>
    	    <div class="row border">
    		<div class="col bg-secondary text-center" ><span name="<?= $value['id_new']; ?>" class="linkin">открыть  новость</span></div> 

    	    </div>
    	</div>>
	<?php endforeach; ?>

<div class="row border">
 <div class="mx-auto"><a href="/">Главная страница </a></div></div>


    </body>
