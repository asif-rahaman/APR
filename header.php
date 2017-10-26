<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
		<!-- Fonts -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/stylesheet.css" />
		<!-- Slick slider -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css" />
		<!-- LiteBox -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lightbox.css" />
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" />
		<!-- Responsive -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/nikos_custom.css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	    <body>
		<!-- HEADER -->
		<header>
			<div class="container-fluid header_top hidden-xs">
				<div class="container">
					<div class="social_net pull-right">
						<a href="<?php echo get_field('youtube_url',5); ?>" class="youtube" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/youtube_sm.png" alt="facebook" /></a>
						<a href="<?php echo get_field('facebook_url',5); ?>" class="facebook" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/facebook_sm.png" alt="youtube" /></a>
					</div>						
					<ul class="nav navbar-nav navbar-right">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Top Menu', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
					</ul>	
				</div>
			</div>
			<div class="container-fluid header_nav hidden-xs">
				<div class="container">
					<div class="apr_logo pull-left">
						<a href="<?php echo home_url(); ?>"><img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/apr_logo.jpg" alt="logo" /></a>
					</div>
					<div class="header_main_nav pull-left">
						<ul class="nav navbar-nav pull-right">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Main Nav', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						</ul>
					</div>	
				</div>							
			</div>
			
			<!-- Only for Mobile view -->
			<div class="header_mob_top hidden-md hidden-sm hidden-lg">
				<div class="bg_black"></div>
				<div class="apr_logo">
					<img class="img-responsive_" src="<?php bloginfo('template_url'); ?>/images/apr_logo.jpg" alt="logo" />
				</div>
			</div>			
			<div class="container-fluid header_nav hidden-md hidden-sm hidden-lg">
				<div role="navigation" class="navbar navbar-inverse">
					<div class="container"> 
						<div class="navbar-header">
						  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>
						<div class="collapse navbar-collapse">
						    <ul class="nav navbar-nav">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Main Nav', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						    </ul>
							<hr />
						    <ul class="nav navbar-nav">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Top Menu', 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
						    </ul>	
							<hr />
							<div class="social_net_black">
								<a href="<?php echo get_field('youtube_url',5); ?>" class="youtube"><img src="<?php bloginfo('template_url'); ?>/images/youtube_black.png" alt="facebook" /></a>
								<a href="<?php echo get_field('facebook_url',5); ?>" class="facebook"><img src="<?php bloginfo('template_url'); ?>/images/facebook_black.png" alt="youtube" /></a>
							</div>
						</div>
					</div>
				</div>							
			</div>
		</header>
		<!-- Body wrapper -->
		<div class="wrapper">

<?php /* ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper"><?php */ ?>