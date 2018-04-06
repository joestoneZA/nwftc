<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="book-iframe" id="book-iframe">
	<iframe class="clearFloat" src="https://secure.rezovation.com/Reservations/CheckAvailabilityEmbedded.aspx?_0E2C76B2YWVR3S" width="300" height="175" frameborder="no" scrolling="No"></iframe>
</div>
<div class="green-iframe" id="green-iframe">
	<div class="row">
		<div class="col-sm-6">
			<img src="<?php echo get_template_directory_uri(); ?>/images/ico-supergreen-large.png" />
		</div>
		<div class="col-sm-6">
			<h2>We are Super Green</h2>
			<ul>
				<li>100% renewable energy</li>
    			<li>Onsite recycling and composting</li>
    			<li>Part of the San Francisco Green Business certification programme</li>
    			<li>Low energy facilities and products used where possible, for example LED lighting</li>
    		</ul>
		</div>
	</div>
</div>
<header class="header" role="banner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 appear">
				<div class="header-top">
					<div class="green-icon">
						<a href="#" data-featherlight="#green-iframe">
							<i class="fa fa-leaf" aria-hidden="true"></i>
							<label>We are Super Green</label>
						</a>
					</div>
					<div class="left">
						<a target="_blank" href="https://www.tripadvisor.co.uk/Hotel_Review-g60713-d112358-Reviews-Parker_Guest_House-San_Francisco_California.html"><img class="tripadvisor" src="<?php echo get_template_directory_uri(); ?>/images/trip-advisor-icon.png" /><label>TripAdvisor Certificate of Excellence 2017</label></a>
					</div>
					<div class="right">
						<div class="phone-number">
							Book online or call <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
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