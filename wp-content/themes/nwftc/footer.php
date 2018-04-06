<div class="footer-book">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<i class="fa fa-times fa footer-images-close" aria-hidden="true"></i>
				<div class="footer-book-links">
					<a class="link yellow">BOOK</a>
					<div class="why-book">
						<div class="why-book-trigger">
							WHY BOOK DIRECT?
							<div class="why-book-content">
								<h3>EXCLUSIVELY YOURS WHEN YOU BOOK DIRECT</h3>
								<p>Most Favorable Deposit &amp; Cancellation Options</p>
								<p>Preferred Room Placement</p>
								<p>Best Rates Guaranteed</p>
								<p>Early Arrival &amp; Late Check Out (Subject to Availability)</p>
								<p>First In Line For Discounts &amp; Promotions</p>
							</div>
						</div>
					</div>
				</div>
				<div class="iframe">
					<iframe class="clearFloat" src="https://secure.rezovation.com/Reservations/CheckAvailabilityEmbedded.aspx?_0E2C76B2YWVR3S" width="300" height="175" frameborder="no" scrolling="No"></iframe>
				</div>
				<div class="social">
					<?php if(get_field('facebook_url','options')){ ?>
						<a target="_blank" href="<?php the_field('facebook_url','options'); ?>">
							<i class="hvr-pop fa fa-facebook" aria-hidden="true"></i>
						</a>
					<?php } ?>
					<?php if(get_field('instagram_url','options')){ ?>
						<a target="_blank" href="<?php the_field('instagram_url','options'); ?>">
							<i class="hvr-pop fa fa-instagram" aria-hidden="true"></i>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>