<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->pageTitle ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/print.css" media="print" />

	<style type="text/css" media="screen">
		h1.fontface {font: 32px/38px 'MichromaRegular', Arial, sans-serif;letter-spacing: 0;}
		p.style1 {font: 18px/27px 'MichromaRegular', Arial, sans-serif;}
		@font-face {
			font-family: 'MichromaRegular';
			src: url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.eot');
			src: url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.eot?#iefix') format('embedded-opentype'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.woff') format('woff'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.ttf') format('truetype'),
			url('<?php echo Yii::app()->theme->baseUrl ?>/css/font/Michroma-webfont.svg#MichromaRegular') format('svg');
			font-weight: normal;
			font-style: normal;
		}
	</style>


	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
</head>
<body>


	  <header>
 <div class="container1">
    <!--start title-->
    <h1 class="fontface" id="title"><?php echo Yii::app()->name ?></h1>
	<!--end title-->
  </div>
    
	</header>
	<!--end header-->
 
	<nav>
		<div class="menu">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Inicio', 'url'=>array('/site/index')),
						array('label'=>'Sobre Nosotros', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contacto', 'url'=>array('/site/contact')),
						array('label'=>'Inicio', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
		</div>
    </nav>
	<div id="wrapper"><!-- #wrapper -->
	<section id="main"><!-- #main content and sidebar area -->

		<aside id="sidebar1"><!-- sidebar1 -->
				<br><br><br>
					
				
					<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ad125.jpg" alt="" /><br /><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/ad125.jpg" alt="" /><br /><br />
						<h3>Latest News </h3><br>
					<ul>
						<li><a href="#">Pellentesque habitant morbi tristique </a></li>
						<li><a href="#">Pellentesque habitant morbi tristique </a></li>
						<li><a href="#">Pellentesque habitant morbi tristique </a></li>
						<li><a href="#">10 Sickened in Conn. by Carbon Monoxide Exposure</a></li>
						<li><a href="#">Iran Seeks U.S. Apology Over Murder Plot Claims </a></li>
						<li><a href="#">Greek Bailout Referendum Sparks Outrage</a></li>
						<li><a href="#">Man dies in N.Y. gym fight after Tasered by police </a></li>
						<li><a href="#">Kansas City missing baby case becoming a circus, critics say</a></li>
					</ul>
			

		</aside><!-- end of sidebar1 -->
        

			<section id="content"><!-- #content -->

				<article class="group1">
					<?php echo $content ?>
				</article>

							
						<div class="newsbox">
<h2> Occupy Wallstreet Movement- Going Global</h2>
 <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/occupy1.jpg" class="floatimgleft">
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
 amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>

<a href="#" class="button"> Read More </a>
    </div>

</section>

	</section><!-- end of #main content and sidebar-->
</div>
		<footer>
		<div class="container1">
		<section id="footer-area">

			<section id="footer-outer-block">
					<aside class="footer-segment">
							<h4>News</h4>
								<ul>
									<li><a href="#">U.S.</a></li>
									<li><a href="#">Local</a></li>
									<li><a href="#">World</a></li>
								</ul>
					</aside><!-- end of #first footer segment -->

					<aside class="footer-segment">
							<h4>About Us</h4>
								<ul>
									<li><a href="#">Corporate HQ</a></li>
									<li><a href="#">Staff</a></li>
									<li><a href="#">History</a></li>
								</ul>
					</aside><!-- end of #second footer segment -->

					<aside class="footer-segment">
							<h4>Contact Us</h4>
								<ul>
									<li><a href="#">Customer Support</a></li>
									<li><a href="#">Divisions</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Job Opportunities</a></li>
								</ul>
					</aside><!-- end of #third footer segment -->
					
					<aside class="footer-segment">
							<h4>Blahdyblah</h4>
								<p>&copy; 2010 <a href="#">yoursite.com</a> Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
					</aside><!-- end of #fourth footer segment -->

			</section><!-- end of footer-outer-block -->

		</section><!-- end of footer-area -->
		</div>
	</footer>
<!-- Free template distributed by http://freehtml5templates.com -->
</body>
</html>
