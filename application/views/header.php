<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <title>TESCO LOTUS LEARNING CENTER</title>
    <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css>
    <style>
	.navbar-default .navbar-nav>li>a {
		color: #fff;
		font-size: 18px;
	}

	.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
		color: #fff;
		background-color: transparent;
	}

	h2 { color: #fff; font-size: 20px;}
	.navbar-default .navbar-toggle .icon-bar {
		background-color: #fff;
	}
	.navbar-default .navbar-toggle {
    border-color: transparent;
}
    .box {
        padding: 5px;
        margin-bottom: 10px;
        display: block;
		width: 150px;
		height: 150px;
		overflow: hidden;
    }
	.box:hover {
		text-decoration: none;
	}
    .box img {
        margin: 0 auto;
        width: 50%;
    }
    .box p {
		
        text-align: center;
        color: #fff;
		margin-top: 20px;
    }

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
		font-size: 12px;
		padding: 20px 0px 0px 15px;
		width: 80%;
	}

	.col-md-2 { display: list-item; }
	.breadcrumb>li+li:before {
		padding: 0 5px;
		color: #ccc;
		content: ">";
	}

	</style>
</head>

<body style='background-color: #29363f'>
    
	<nav class="navbar navbar-default" style="border: 0px; background-color: #019b79; height: 70px; border-radius: 0px;">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url();?>/assets/images/Logo.png" style="height: 40px;" alt="Tesco Lotus Learning Center">
			</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right" style="margin-top: 8px">
				<li><a href="#"><?php echo $this->session->userdata('name');?></a></li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-align-justify"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
					<li><a href="<?php echo site_url();?>">ทำแบบทดสอบ</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo site_url('auth/logout');?>" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">ออกจากระบบ</a></li>
				</ul>
				</li>
			</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
