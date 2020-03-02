<!DOCTYPE HTML>
<html>
    <head>
	<title><?= $title; ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="/assets/css/main.css" />
	<link  rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- Scripts -->
	<script src="/assets/js/jquery-3.4.1.js"></script>
	<script src="/assets/js/skel.min.js"></script>
	<script src="/assets/js/util.js"></script>
	<script src="/assets/js/main.js"></script>

	<script src="/assets/js/jquery.accordion.js"></script>
	<script src="/assets/js/jquery.cookie.js"></script>
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

    </head>
    <body>

	<div id="wrapper">
	    <div id="main">
		<?php //print_r($title); ?>
		<?php echo $content; ?>
	    </div>
	</div>

    </body>
</html>
