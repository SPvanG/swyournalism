<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if (has_post_thumbnail() ) : ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="header-image" style="background-image: url(<?php echo $url; ?>);"></div>
	<?php endif; ?>

	<div class="container project">
		<div class="header">
			<div class="project-type">Proposal</div>
			<div class="project-title"><?php the_title(); ?></div>
			<div class="author">
				<div class="author-image" style="background-image: url(<?php bloginfo('template_url'); ?>/images/author-huub.jpg);"></div>
				<div class="author-name">Huub Schuijn <i class="fa fa-play"></i></div>
			</div>
		</div>

		<div class="project-info">
			<div class="info-type">
				<div class="number">80</div>
				<div class="description">people backed</div>
			</div>
			<div class="info-type">
				<div class="number">&euro;2500</div>
				<div class="description">as a target</div>
			</div>
			<div class="info-type">
				<div class="number">12 hours</div>
				<div class="description">timelimit</div>
			</div>
			<div class="progressbar">
				<div class="completed" style="width: calc(70% - 10px);">70%</div>
			</div>
			<div class="button">donate <i class="fa fa-play"></i></div>
		</div>
	
		<div class="content">
			<div><?php the_content(); ?></div>
	
			<div class="social">
				<p>Let your friends get involved</p>
				<p>
					<span class="icon"><i class="fa fa-fw fa-twitter"></i></span>
					<span class="icon"><i class="fa fa-fw fa-facebook"></i></span>
					<span class="icon"><i class="fa fa-fw fa-linkedin"></i></span>
					<span class="icon"><i class="fa fa-fw fa-rss"></i></span>
				</p>
			</div>

			<div class="section-related">
				<h2>Related proposals</h2>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/blaat.png)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>



<?php endwhile; ?>

<?php get_footer(); ?>
