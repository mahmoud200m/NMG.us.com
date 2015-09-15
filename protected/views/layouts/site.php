<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NMG - Homepage</title>

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/style.css">

	<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/jquery.js"></script>
	<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/jquery-ui.min.js"></script>
	<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/resize.js"></script>
	<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/script.js"></script>
</head>
<body>
<div id="loading" class="no-resize">
	<img class="no-resize" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/loading.gif" alt="Loading ..." />
</div>
<div id="body">
	<header class="site-header">
		<div class="logo">
			<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/logo.png" alt="Logo" />
		</div>

		<nav class="main-nav">
			<ul>
				<li <?php echo (Yii::app()->session['nav']=='home')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/home");?>">Home</a></li>
				<li <?php echo (Yii::app()->session['nav']=='industries')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/environments");?>">Environments</a></li>
				<li <?php echo (Yii::app()->session['nav']=='products')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/products");?>">Products</a></li>
				<li <?php echo (Yii::app()->session['nav']=='services')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/services");?>">Services</a></li>
				<li <?php echo (Yii::app()->session['nav']=='partners')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/partners");?>">Partners</a></li>
				<li <?php echo (Yii::app()->session['nav']=='gallery')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/gallery");?>">Gallery</a></li>
				<li <?php echo (Yii::app()->session['nav']=='contacts')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/contacts");?>">Contacts</a></li>
			</ul>
		</nav>

		<div class="header-login-search">
			<div class="login-button">
				<span class="before">/</span>
				<a href="#">Log in</a>
				<span class="after">/</span>
			</div>

			<div class="search-box">
				<input type="text" placeholder="Search NMG Website" class="search-input">
				<button class="search-submit">
					<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/search-icon.png" alt="Search" />
				</button>
			</div>
		</div>
	</header>
		
	<?php echo $content; ?>

	<footer class="footer">
		<div class="footer-widget">
			<div class="widget">
				<div class="widget-title">
					<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/hexagon.png" alt="hexagon" />
					<h2>Subscribe</h2>
				</div>
				<div class="widget-body subscribe">
					<p>For our latest news,events and products please <br>subscribe to our monthly newsletter</p>
					<div class="newsletter">
						<input id="newsletter-input" type="text" placeholder="Enter your Email" />
						<img id="newsletter-button" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/hexagon-button.png" alt="button" />
					</div>
				</div>
			</div>
			<div class="widget">
				<div class="widget-title">
					<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/hexagon.png" alt="hexagon" />
					<h2>About</h2>
				</div>
				<div class="widget-body">
					<p>NMG is a design-build workplace solution provider, offering a comprehensive approach; handling everything associated with a project on behalf of the owner, including conceptual design, space planning, procurement, installation and project management.</p>
				</div>
			</div>
			<div class="widget">
				<div class="widget-title">
					<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/hexagon.png" alt="hexagon" />
					<h2>Stay connected</h2>
				</div>
				<div class="widget-body">
					<div class="footer-sc-icons">
						<a target="_blank" href="http://facebook.com/NMGinternational"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/facebook.png" alt="facebook" /></a>
						<a target="_blank" href="http://twitter.com/NMGUnitedStates"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/twitter.png" alt="twitter" /></a>
						<a target="_blank" href="http://youtube.com/NMGinternational"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/youtube.png" alt="youtube" /></a>
						<a target="_blank" href="http://vimeo.com/NMGinternational"><img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/vimeo.png" alt="vimeo" /></a>
					</div>
				</div>
			</div>
		</div>
		<center class="footer-nav">
			<ul> 
				<li <?php echo (Yii::app()->session['nav']=='home')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/home");?>">Home</a></li>
				<li <?php echo (Yii::app()->session['nav']=='industries')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/environments");?>">Environments</a></li>
				<li <?php echo (Yii::app()->session['nav']=='products')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/products");?>">Products</a></li>
				<li <?php echo (Yii::app()->session['nav']=='services')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/services");?>">Services</a></li>
				<li <?php echo (Yii::app()->session['nav']=='partners')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/partners");?>">Partners</a></li>
				<li <?php echo (Yii::app()->session['nav']=='gallery')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/gallery");?>">Gallery</a></li>
				<li <?php echo (Yii::app()->session['nav']=='contacts')?'class="active"':''; ?> ><a href="<?php echo Yii::app()->createUrl("site/contacts");?>">Contacts</a></li>
			</ul>
		</center>
	</footer>
</div>
</body>
</html>