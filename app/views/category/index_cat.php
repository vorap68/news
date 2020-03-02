
<!DOCTYPE html>
<html>
    <head lang="en">
	<meta charset="UTF-8">
	<title></title>
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<!--	<script  type="text/javascript" src="/assets/js/jquery-3.4.1.js"></script>    -->
        <script>
            $(document).ready(function(){
                $('span.linkin').hover(function(){
                    $(event.target).css('background','green');
                },function(){
                    $(event.target).css('background','');
                });
                $('span.linkin').on("click",function(event){
                    var id = $(event.target).attr('name');
                             $('<form method="POST" action ="news/one"/>')
                       .append($('<input name="id">').val(id))
                       .appendTo($(document.body))
                        .submit();
                });
            });
            </script>

</head>
    <body>
	<h3> Все статьи рубрики <span style="text-decoration: underline"><?= $_SESSION['rubric']?></span></h3>
	<?php foreach ($result as $key => $value): ?>
    	<hr>
    	<div class="container" >



    	    <div class="row border " >
    		<div class="col-sm-2 bg-secondary text-center ">автор статьи: </div> 
    		<div class="col-sm-3 mr-auto"> <span  ><?= $value['author']; ?></span>
    		</div>
    	    </div>
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
    		<div class="col bg-secondary text-center" ><span name="<?= $value['id_new']; ?>" class="linkin">открыть  новость</span></div> 

    	    </div>
    	</div>
	<?php endforeach; ?>


    </body>

    <a href="/">Вернуться на главную</a><?php


