<style>
    .logout{
	background-color: #DCDCDC;
	padding: 16px;
	font-size: 14px;
	border: none;
	font-weight: bold;
    }
    /* Dropdown Button */
    .dropbtn {
	background-color: #4CAF50;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
	position: relative;
	display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
	display: none;
	position: fixed;
	background-color: #f1f1f1;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	/*    height:200px;*/
    }

    /* Links inside the dropdown */
    .dropdown-content a {
	color: black;
	padding: 2px 16px;
	text-decoration: none;
	display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd;}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    .dcjq-parent-li {
	display: inline  !important;
	margin-left: 0 !important;
	padding-left: 0 !important;
	border-left: none !important;	
	
    }
    .dcjq-parent-li ul li{

/*	padding: 40px 10px !important;*/
/*	border-bottom: dotted 1px rgba(160, 160, 160, 0.65);
	background-color: #7ea8a1;*/
	display: inline  !important;
	border-left: none !important;
	padding-left: 10px !important;
	}
	.dcjq-parent-li ul li a{
	    padding: 0 25px !important;
	  
	}
   
	    .dcjq-parent-li a{
		font-size: 1em !important;
		text-transform: none !important;
		padding:15px;
		
		border-bottom: dotted 1px rgba(160, 160, 160, 0.65);
	    }
            .form-search input{
  display: block !important;
  border-bottom: 1px solid;
}
.form-search input {
  all: unset;
}
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('span.id0').on("click", function (event) {
                       var sname = $(event.target).attr('name');
                      $('<form method="post" action="news/author_all_news"/>')
                    .append($('<input type="hidden" name="sname">').val(sname))
                    .appendTo($(document.body))
                    .submit();
        });
        $('#search_name').on("click",function(){
            $('#search_name').text("");
           //alert(textt);
        });
        $('#search_name').on("keydown",function(e){
            if (e.keyCode===13){
                var search_name =  $('#search_name').val();
                        $('form').submit();
		//alert(search_name);
        }
        });
         
        $(".category").dcAccordion();
    });
</script>

<header id="header">
    <?php //print_r($_SESSION);?>
    <h3> </h3>
    <nav class="links">
	<ul>
	    <div class="dropdown">
		<li><a href="#" class="dropbtn">Поиск новости</a></li>
		<div class="dropdown-content">
                    <form class="form-search" action="news/search" method="POST">
                    <input type="search" placeholder="По названию" id="search_name" name="search_name"></input>
		 
                    </form>
                </div>
	    </div>
	    <div class="dropdown">
		<li><a href="#" class="dropbtn">Выбор рубрики</a> </li>
		<div class="dropdown-content">
		    <ul class="category" >
			<?php echo $result_menu ?>
		    </ul>
		    </li>
		</div>
	    </div>

	    <div class="dropdown">
		<li><a href="#" class="dropbtn">Все авторы</a></li>
		<div class="dropdown-content">

		    <?php foreach ($result_author as $value): ?>   
    		    <span class="id0" style="display:block; padding:0px 16px;border-bottom: dotted 1px;" name="<?php echo $value['sname'] ?>"><?= $value['sname'] ?> </span>
		    <?php endforeach; ?>

		</div></div>
	    <?php if (!empty($_SESSION['sname'])): ?>
    	    <li><a href="author/logout" class="button ">Log Out  <span class="logout"><?= $_SESSION['sname'] ?></span> </a></li>
    	    <li> <a href="author/article_add" class="button ">Добавить статью</a></li>
	    <?php else: ?>
    	    <li><a href="author/login" class="button ">Log In</a></li>
		<?php endif; ?>

	</ul>
    </nav>


</header>







