<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kube4
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
		<script>				
			conditionizr.add('ie8', function () {
			  return (Function('/*@cc_on return (@_jscript_version > 5.7 && !/^(9|10)/.test(@_jscript_version)); @*/')());
			});
			conditionizr.config({
			  tests: {    
			    'ie8': ['class', 'scripts']
			  }
			});			
			conditionizr.polyfill('//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js', ['ie6', 'ie7', 'ie8']);
			conditionizr.polyfill('//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js', ['ie6', 'ie7', 'ie8']);	
			conditionizr.polyfill('//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js', ['ie6', 'ie7', 'ie8']);
			conditionizr.polyfill('//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js', ['ie6', 'ie7', 'ie8'])	
			//conditionizr.polyfill('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js', ['ie6', 'ie7', 'ie8']);
			<!--[if IE]><![endif]-->
		</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site units-container units-row">
	
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kube4' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<div class="navigation-toggle" data-tools="navigation-toggle" data-target="#site-navigation">
			<span>Menu</span>
		</div>
			<nav id="site-navigation" class="navbar main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
