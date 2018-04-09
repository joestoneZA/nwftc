<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 left">
				<img src="<?php the_field('footer_logo','options'); ?>" />
				<?php the_field('address','options'); ?><br clear="both"><br>
				&copy; Copyright NWFTC Ltd <?php echo date('Y'); ?>. <a href="https://www.zeroabove.co.uk" target="_blank">Handmade by Zero Above</a>
			</div>
			<div class="col-sm-6 right">
				<h4>Subscribe to our newsletter</h4>
				<form class="subscribe">
					<input type="text" placeholder="Email address">
					<input type="submit" value="Subscribe" />
					<input type="checkbox" />
					<label>We would like to occassinally send you communications via email to keep you up to date with the latest news, blogs and information from us. Please confirm if you would like us to contact you by checking the box - You can unsubscribe at any time.</label>
				</form>
				<div class="social">

					<?php if(get_field('facebook_url','options')){ ?>
						<a class="facebook" target="_blank" href="<?php the_field('facebook_url','options'); ?>">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if(get_field('twitter_url','options')){ ?>
						<a class="twitter" target="_blank" href="<?php the_field('twitter_url','options'); ?>" >
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if(get_field('youtube_url','options')){ ?>
						<a class="youtube" target="_blank" href="<?php the_field('youtube_url','options'); ?>">
							<i class="fa fa-youtube-play" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if(get_field('linkedin_url','options')){ ?>
						<a class="linkedin" target="_blank" href="<?php the_field('linkedin_url','options'); ?>">
							<i class="fa fa-linkedin" aria-hidden="true"></i>
						</a>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>