<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
		

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link rel="icon" href="http://www.lifeyoulove.co/favicon.ico?v=2" />
	
    <!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">	
	
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
  
  <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/images/apple-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/apple-icon-114x114.png">
	
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<header id="header" class="navbar">
		<nav id="navigation">
			
<?php if (is_home()|| is_archive() || is_author() || is_category() || is_singular('post') || is_tag()):?>
<div class="magazine_logo">	
<a href="<?php bloginfo('url');?>/magazine">
<img src="<?php bloginfo('template_directory');?>/images/nav_logo_magazine.png" class="scale-with-grid vertical"/></a>
<?php else:?>
<div class="main_logo">	
<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_directory');?>/images/nav_logo.png" class="scale-with-grid vertical"/></a>
</div>
<?php endif;?>


<div class="nav_left top_nav">
<?php wp_nav_menu( array( 'theme_location' => 'header-menu','link_before' => '<span>', 'link_after' => '</span>','menu_class' => 'menu') ); ?>
</div>

<div class="nav_right top_nav">
	<ul class="utils_nav">
		<li><?php global $woocommerce; ?>
 			<a class="your-class-name" href="<?php echo $cart_url = wc_get_cart_url(); ?>" title="<?php _e('Cart View', 'woothemes'); ?>">
				<i class="fal fa-shopping-bag"></i> <?php echo $woocommerce->cart->get_cart_total(); ?></a></li>
		<li><a href="<?php bloginfo('url');?>/my-account"><i class="fal fa-user-circle"></i></a></li>
<?php if ( is_user_logged_in() ):?> <li><a href="<?php bloginfo('url');?>/courses"><i class="fal fa-graduation-cap"></i></a></li><?php endif;?>
	</ul>

			</nav><!-- /navigation -->
		</div>
	</header><!-- /header -->

<div id="content-wrap">