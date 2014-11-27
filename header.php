<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

<body <?php body_class(); ?>>
	<div class="container">
		<!--div class="secondary alert" id="cookie">This site uses cookies to improve user experience. <a href="#" id="cookieOK">Click here</a> to dismiss this warning.</div-->
		<div class="header" role="banner">
			<div class="row">
				<div class="six columns">
					<h1 class="hide-for-small"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/header/logo.png"></a></h1>
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
				<a class="toggle" gumby-trigger="#nav1 ul.menu" href="#"><i class="icon-menu"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'sideUKmenu', 'container' => false, 'walker' => new Walker_Page_Custom ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'social', 'container' => false, 'walker' => new Walker_Page_Custom ) ); ?>
			</div>
		</div>
		</div>

