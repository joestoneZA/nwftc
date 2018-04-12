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
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					Call us on <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a> or email <a href="mailto:<?php the_field('email_address','options'); ?>"><?php the_field('email_address','options'); ?></a>
				</div>
				<div class="col-sm-6 right">
					PORTAL LOGIN / WELCOME [REG-USER] <img class="user-icon" src="<?php echo get_template_directory_uri(); ?>/images/user-icon.png" />
				</div>
			</div>
		</div>
	</div>
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="logo">
						<a href="<?php echo site_url(); ?>">
							<img src="<?php the_field('header_logo','options'); ?>" />
						</a>
					</div>
					<nav class="menu" role="navigation">
						<?php wp_nav_menu( array( 'menu' => 'Main Navigation' ) ); ?>
					</nav>
					<div class="cart-block">
						<div class="left">
							<i class="cart-icon fa fa-shopping-cart" aria-hidden="true"></i>
						</div>
						<div class="right">
							<div class="top">
								&pound;0.00
							</div>
							<div class="bottom">
								0 items
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<i class="nav-icon fa fa-bars" aria-hidden="true"></i>
	</div>
</header>