<?php global $post;
$post_slug=$post->post_name; ?>

<div class="top-link-bar">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul>
					<li class="<?php if($post_slug == 'about'){ ?>active<?php } ?>">
						<a href="<?php echo site_url(); ?>/about">
							About us
						</a>
					</li>
					<li class="<?php if($post_slug == 'meet-the-team'){ ?>active<?php } ?>">
						<a href="<?php echo site_url(); ?>/meet-the-team">
							Meet The Team
						</a>
					</li>
					<li class="<?php if(is_post_type_archive('testimonials')){ ?>active<?php } ?>">
						<a href="<?php echo site_url(); ?>/feedback">
							Feedback
						</a>
					</li>
					<li class="<?php if(is_home() || is_singular('post')){ ?>active<?php } ?>">
						<a href="<?php echo site_url(); ?>/news">
							News
						</a>
					</li>
					<li class="<?php if(is_post_type_archive('careers') || is_singular('careers')){ ?>active<?php } ?>">
						<a href="<?php echo site_url(); ?>/careers">
							Careers
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>