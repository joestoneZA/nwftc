<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header" role="banner">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 logo appear">
				<a href="<?php echo site_url(); ?>">
					<img src="<?php the_field('logo','options'); ?>" />
				</a>
			</div>
			<div class="col-sm-10 appear" style="position:static;">
				<nav class="menu" role="navigation">
					<?php wp_nav_menu( array( 'menu' => 'Main Navigation' ) ); ?>
				</nav>
			</div>
		</div>
	</div>
	<i class="nav-icon fa fa-bars" aria-hidden="true"></i>
</header>