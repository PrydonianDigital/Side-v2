<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?> : <?php bloginfo('description'); ?></title>
<meta name="description" content="<?php bloginfo('name'); ?> : <?php bloginfo('description'); ?>" />
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
	if(is_single()) {
		$twitter_url = get_permalink();
		$twitter_title = get_the_title();
		$twitter_desc = get_the_excerpt();
		$twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), slider );
		$twitter_thumb  = $twitter_thumbs[0];
?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@SideUK">
<meta name="og:title" content="<?php echo $twitter_title; ?>">
<meta name="twitter:url" content="<?php echo $twitter_url; ?>">
<meta name="twitter:domain" content="<?php bloginfo('url'); ?>">
<meta name="twitter:description" content="<?php echo $twitter_desc; ?>">
<meta name="twitter:creator" content="@SideUK">
<meta name="twitter:app:id:iphone" content="">
<meta name="twitter:app:id:ipad" content="">
<meta name="twitter:app:id:googleplay" content="">
<meta name="twitter:app:url:iphone" content="">
<meta name="twitter:app:url:ipad" content="">
<meta name="twitter:app:url:googleplay" content="">
<meta name="twitter:image" content="<?php echo $twitter_thumb; ?>">
<meta property="og:title" content="<?php echo $twitter_title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $twitter_thumb; ?>" />
<meta property="og:url" content="<?php echo $twitter_url; ?>" />
<meta property="og:description" content="<?php echo $twitter_desc; ?>" />
<meta property="title" content="<?php echo $twitter_title; ?>" />
<meta property="type" content="article" />
<meta property="image" content="<?php echo $twitter_thumb; ?>" />
<meta property="url" content="<?php echo $twitter_url; ?>" />
<meta property="description" content="<?php echo $twitter_desc; ?>" />
<?php		
	}
?>
<?php endwhile; else :  endif; ?>

</head>

<body <?php body_class(); ?>>
	<div class="container">
		<!--div class="secondary alert" id="cookie">This site uses cookies to improve user experience. <a href="#" id="cookieOK">Click here</a> to dismiss this warning.</div-->
		<div class="header" role="banner">
			<div class="row">
				<div class="six columns">
					<h1 class="hide-for-small mainLogo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/header/logo.png"></a></h1>
					<h1 class="hide-for-large"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/header/logo_responsive.png"></a></h1>
				</div>
				<div class="push_three three columns">
					<h2><?php bloginfo('description'); ?></h2>			
				</div>
			</div>
		</div>
		<div class="row">
		<div class="navbar" id="nav1" role="navigation">
			<div class="row">
				<a class="toggle" gumby-trigger="#nav1 ul.menu" href="#"><span>Menu</span> <i class="icon-menu"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'sideUKmenu', 'container' => false, 'walker' => new Walker_Page_Custom ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'social', 'container' => false, 'walker' => new Walker_Page_Custom ) ); ?>
			</div>
		</div>
		</div>

