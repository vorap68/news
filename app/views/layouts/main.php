<!DOCTYPE HTML>

<html>
    <head>
	<title><?=$title;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="/assets/css/main.css" />
	<link  rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- 1. Подключим библиотеку jQuery (без нее jQuery UI не будет работать) -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
<script  type="text/javascript" src="/assets/js/jquery-3.4.1.js"></script>   
<!-- 2. Подключим jQuery UI -->
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>-->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href="/assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<!--<script src="/assets/js/jquery-3.4.1.js"></script>
	<script src="/assets/js/jquery-ui.js"></script>-->
	<script src="/assets/js/jquery.accordion.js"></script>
	<script src="/assets/js/jquery.cookie.js"></script>
    </head>
    <body>
	<?php require 'header.php';
	?>
	<div id="wrapper">

	    <div id="main">
		<?php echo $content; ?>
		<!-- Pagination -->
		<ul class="actions pagination">
		    <li><a href="" class="disabled button big previous">Previous Page</a></li>
		    <li><a href="#" class="button big next">Next Page</a></li>
		</ul>

	    </div>

	</div>
	
    </body>
</html>