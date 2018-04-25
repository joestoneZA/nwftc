<?php /* Template name: Contact */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container contact-page">
	<div class="row contact-top">
		<div class="col-sm-5 col-md-4 left">
			<h2>NWFTC Head office:</h2>
			<div><strong>The Beeches</strong></div>
			<?php the_field('address','options'); ?>
			<br>
			<div class="email">
				<div class="icon">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</div>
				<a href="<?php the_field('email_address','options'); ?>">
					<?php the_field('email_address','options'); ?>
				</a>
			</div>
			<div class="phone">
				<div class="icon">
					<i class="fa fa-phone" aria-hidden="true"></i>
				</div>
				<a href="<?php the_field('phone_number','options'); ?>">
					<?php the_field('phone_number','options'); ?>
				</a>
			</div>
		</div>
		<div class="col-sm-7 col-md-8 right">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d157473.15637085805!2d0.7979953123175838!3d51.924503287940695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d90304f194c34d%3A0xad63be33782c9033!2sNational+Wind+Farm+Training+Centres!5e0!3m2!1sen!2suk!4v1523456050432" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="row contact-form">
		<div class="col-xs-12">
			<?php echo do_shortcode('[contact-form-7 id="6" title="Contact form 1"]'); ?>
		</div>
	</div>
	<div class="row location-blocks">
		<?php if( have_rows('locations') ): ?>
            <?php while ( have_rows('locations') ) : the_row(); ?>
               	<div class="col-sm-6">
					<?php the_sub_field('iframe_embed_code'); ?>
					<h4>
						<?php the_sub_field('name'); ?>
					</h4>
					<p>
						<?php the_sub_field('address'); ?>
					</p>
				</div>
            <?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>