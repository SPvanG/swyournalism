<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php
	$categories = get_the_category();
	$types = array();
	if( !empty($categories) ) foreach ($categories as $cat) $types[] = $cat->name;

	$meta = get_post_meta( $post->ID );
	?>


	<?php if (has_post_thumbnail() ) : ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="header-image" style="background-image: url(<?php echo $url; ?>);"></div>
	<?php endif; ?>

	<div class="container project">
		<div class="header">
			<div class="project-type">Voorstel</div>
			<div class="project-title"><?php the_title(); ?></div>
			<div class="author">
				<div class="author-image" style="background-image: url(<?php bloginfo('template_url'); ?>/images/author-huub.jpg);"></div>
				<div class="author-name">Huub Schuijn <i class="fa fa-play"></i></div>
			</div>
		</div>

		<div class="project-info">
			<?php if (in_array('proposal', $types) ): ?>
				<div class="info-type">
					<div class="number"><?php echo $meta['backed'][0]; ?></div>
					<div class="description">mensen doneerden</div>
				</div>
				<div class="info-type">
					<div class="number">&euro;<?php echo $meta['target'][0]; ?></div>
					<div class="description">is het doel</div>
				</div>
				<div class="info-type">
					<div class="number"><?php echo $meta['timelimit'][0]; ?> uren</div>
					<div class="description">te gaan</div>
				</div>
				<div class="progressbar">
					<div class="completed" style="width: calc(<?php echo $meta['completed'][0]; ?>% - 10px);"><?php echo $meta['completed'][0]; ?>%</div>
				</div>
				<div class="button">doneer <i class="fa fa-play"></i></div>
			<?php endif; ?>
			<?php if (in_array('project', $types) ): ?>
				<div class="board">
					<span class="member" style="background-image:url(<?php bloginfo('template_url'); ?>/images/author-name.jpg);"></span>
					<span class="member" style="background-image:url(<?php bloginfo('template_url'); ?>/images/author-sybren.png);"></span>
					<span class="member" style="background-image:url(<?php bloginfo('template_url'); ?>/images/author-huub.jpg);"></span>
					<span class="member" style="background-image:url(<?php bloginfo('template_url'); ?>/images/author-joris.jpg);"></span>
					<div class="clearfix"><a href="#">Raad <i class="fa fa-play"></i></a></div>
				</div>
			<?php endif; ?>
		</div>
	
		<div class="content">
			<div class="<?php echo implode(' ', $types); ?>"><?php the_content(); ?></div>
	
			<div class="social">
				<p>Deel dit met je vrienden</p>
				<p>
					<span class="icon"><i class="fa fa-fw fa-twitter"></i></span>
					<span class="icon"><i class="fa fa-fw fa-facebook"></i></span>
					<span class="icon"><i class="fa fa-fw fa-linkedin"></i></span>
					<span class="icon"><i class="fa fa-fw fa-google-plus"></i></span>
				</p>
			</div>

			<div class="section-related">
				<h2>Andere voorstellen</h2>
				<div class="related">
					<div class="related-image" style="background-image:url(<?php bloginfo('template_url');?>/images/author-name.jpg)"></div>
					<a href="">titel moet hier nog komen</a>
				</div>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>



<?php endwhile; ?>

<?php get_footer(); ?>
