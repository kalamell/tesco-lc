<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <title>v30 - TESCO LOTUS LEARNING CENTER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font.css">
    <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css>
    <script src="https://use.fontawesome.com/a764165cf7.js"></script>
	    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/css/jquery.fancybox.min.css">



	

    <style>
    * {
    	/*font-family: 'kittithada_light_45_fregular';*/
    }
    .dropdown-menu>li>a { font-size: 14px; }
	.navbar-default .navbar-nav>li>a {
		color: #fff;
		font-size: 14px;

	}

	.bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
		font-size: 14px;
		color: #000;
		width: 100%;
	}

	.btn-group.bootstrap-select { width: 100% !important; }

	.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
		color: #fff;
		background-color: transparent;
	}

	/*h2 { color: #fff; font-size: 28px;}*/
	h2 { color: #fff; font-size: 18px;}
	a.list-group-item, .panel-title>a, .panel-default>.panel-heading+.panel-collapse>.panel-body {
		font-size: 14px; /* 20*/
		font-weight: 500;
	}
	.navbar-default .navbar-toggle .icon-bar {
		background-color: #fff;
	}
	.navbar-default .navbar-toggle {
	    border-color: transparent;
	}


	a.navbar-brand img {
    	height: 40px;
    }

    @media screen and (max-width: 480px) {
    	a.navbar-brand img {
	    	height: 30px;
	    }

	    .navbar-default .navbar-nav .open .dropdown-menu>li>a {
		    color: #fff;
		}

		.box-main {
			padding:0px;
			margin-top: 10px;
		}

		.box-answer ol {
			margin-left: 0px;
			padding-left:0px;
		}

    }
    .box {
        padding: 5px;
        
        display: block;
		height: 150px;
		overflow: hidden;

		    align-items: center;
    justify-items: center;
    display: flex;
    flex-direction: column;


    }
	.box:hover {
		text-decoration: none;
	}
    .box img {
        margin: 0 auto;
        width: 50%;
        height: 42%;
    }
    .box p {
		line-height: 1;
        text-align: center;
        color: #fff;
		margin-top: 20px;
		font-size: 14px;
    }
    th, td { font-size: 20px; }

	a.book {
		background: url('<?php echo base_url();?>assets/images/icon_course_book.png') no-repeat;
		background-size: 140px auto;
		height: 150px;
		display: block;
		color: #fff;
		text-decoration: none;
	}
	a.book img{
		margin: 0 auto;
        width: 50%;
	}
	a.book p {
		text-align: center;
		color: #fff;
		font-size: 14px;
		padding: 14px 0px 0px 17px;
		width: 70%;
		/*font-weight: bold;*/
		text-shadow: 0px 2px 0px #000;
	}

	/*.col-md-2 { display: list-item; }*/

	.breadcrumb>li+li:before {
		padding: 0 5px;
		color: #ccc;
		content: ">";
	}
	.breadcrumb a, .breadcrumb li {
		font-size: 14px;
		font-weight: bold;
		text-shadow: 0px;
	}



	.modal-title {
	    font-size: 14px;
	    color: #fff;
	}
	p.description { font-size: 14px; }

	.modal-footer .btn {
	   font-size: 14px;
	}

	.modal-header {
		background-color: #009688;
	}

	.title-choice { font-size: 14px; color: #000; background-color: #fff;  margin-top: 0px; padding: 10px;}

	ol.abcd li label {
	    font-size: 14px;
	    color: #fff;
	    font-weight: 100;
	    text-shadow: 0px 0px 0px;
	    margin-bottom: 15px;
	    width: 100%;
	}

	ol.abcd li label input[type=radio] {
		width: 20px;
		height: 20px;

	}

	<?php if ($this->uri->segment(1) == 'classroom' && $this->uri->segment(2)=='id'):?> 
	body,html{
		height:100%;
		}
		
		#footer{
			
			padding: 10px;
			background: #019b79;
		}
	<?php endif;?>

	.bootstrap-select.btn-group .dropdown-toggle .filter-option {
    font-size: 14px;
    font-weight: 500;
}

.box2 {
	padding: 4px;
}

    .modal-open .modal {
        top: 15%;
    }




    .modal-footer {
    	text-align: center;
    }



    ol.abcd li:hover {
    	background-color: #a5a5a5;
    	color: #000;
    	list-style: none;
    }
    ol.abcd li:hover label { color: #000; font-weight: 500; }

    .box-answer { display: none }
    .box-answer.active { display: block; }

    html,body { height: 100%; margin: 0px; padding: 0px; }
     #screen { height: 90% }

    #screen {
    	display: flex;
    	flex-direction: column;
    	padding: 0px;
    	margin-top: -20px;
    }

    #screen #scorm, #screen #vdo, #screen #html {
    	flex: 1;
    }


    #screen #vdo { display: flex; }



    video { flex: 1; width: 100%; }


     @media (min-width: 340px) and (max-width: 650px) {
     	 .box img {
	        margin: 0 auto;
	        width: 70%;
	    }

	    a.navbar-brand img {
		    height: 30px;
		}

		a.book {
			background-size: contain;
		}

		a.book p { 
		    width: 80%;
    		padding: 20px 0px 0px 27px; text-align: left; font-size: 12px;}

		
     }

     .modal-body.fix {
     	height: 350px;
     }

     @media (min-width: 651px) and (max-width: 740px) {
     	 .box img {
	        margin: 0 auto;
	        width: 44%;
	    }

	    a.book {
			background-size: contain;
		}

		a.book p {
			text-align: left;
			width: 50%;
			padding-left: 25px;
		}

		.modal-body.fix { 
			height: 175px;
		 }

	    
		
     }


     #main {
     	padding-bottom: 50px;
     }

     #right-menu, #gotohome,#documents { float: right; }
     #documents-prev, #documents-next { width: 130px; }

     .mb { display: none; }
     .pc { display: block; }

     .h-testing {
     	font-size: 1.8em; 
     }

     .h-img {
     	width: 120px;
     }

     @media screen and (max-width: 740px) {
     	.pc { display: none; }
     	.mb { display: block; }
     	#documents-prev span, #documents-next span,#document-prev span, #document-next span, #gotohome span, #documents span {
     		display: none;
     	}
     	 #documents-prev, #documents-next,#document-prev, #document-next, #gotohome, #docuemnts { width: 50px; }

     	 .h-testing {
	     	font-size: 1.3em; 
	     }

	     .h-img {
	     	width: 70px;
	     }
     }





	</style>
</head>

<body style='background-color: #29363f' id="bd">
    
	<nav class="navbar navbar-default" style="border: 0px; background-color: #019b79; border-radius: 0px;">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url();?>">
				<img src="<?php echo base_url();?>/assets/images/Logo.png" style="" alt="Tesco Lotus Learning Center">
			</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class='pc'>
				<ul class="nav navbar-nav navbar-right" style="margin-top: 8px">
					<li><a href="#"><?php echo $this->session->userdata('fullname');?></a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-align-justify"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url();?>"><i class='fa fa-home'></i> หน้าหลัก / Home</a></li>
						<li><a href="<?php echo site_url('testing');?>"><i class='fa fa-edit'></i> ทำแบบทดสอบ / Testing</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo site_url('auth/logout');?>" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');"><i class='fa fa-sign-out'></i> ออกจากระบบ / Logout</a></li>
					</ul>
					</li>
				</ul>
				</div>

				<div class='mb'>

					<ul class="nav navbar-nav navbar-right" style="margin-top: 8px">
						<li><a href="#"><?php echo $this->session->userdata('fullname');?></a></li>

							<li><a href="<?php echo site_url();?>"><i class='fa fa-home'></i> หน้าหลัก / Home</a></li>
							<li><a href="<?php echo site_url('testing');?>"><i class='fa fa-edit'></i> ทำแบบทดสอบ / Testing</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="<?php echo site_url('auth/logout');?>" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');"><i class='fa fa-sign-out'></i> ออกจากระบบ / Logout</a></li>

					</ul>
				</div>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
