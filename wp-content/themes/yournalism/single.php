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
			<?php if(in_array('proposal', $types)): ?><div class="project-type">Voorstel</div><?php endif; ?>
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
				<button id="donatenow" class="button">doneer <i class="fa fa-play"></i></button>
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
				<?php
				$url = urlencode(get_bloginfo('url') ."/". $post->post_name);
				$title = urlencode($post->post_title);
				?>
				<p>Deel dit met je vrienden</p>
				<p>
					<a class="icon" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $url; ?>"><i class="fa fa-fw fa-twitter"></i></a>
					<a class="icon" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="fa fa-fw fa-facebook"></i></a>
					<a class="icon" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>"><i class="fa fa-fw fa-linkedin"></i></a>
					<a class="icon" target="_blank" href="https://plus.google.com/share?url=<?php echo $url; ?>"><i class="fa fa-fw fa-google-plus"></i></a>
				</p>
			</div>

			<div class="section-related">
				<h2>Andere voorstellen</h2>
				<?php 
				$projects = get_posts(array( 'exclude' => $post->ID, 'posts_per_page' => 12 ));
				if( !empty($projects) ) foreach( $projects as $project ): ?>
					<?php if( has_post_thumbnail($project->ID) ) $url = wp_get_attachment_url( get_post_thumbnail_id($project->ID) ); else $url = ''; ?>
					<div class="related">
						<a href="<?php echo get_bloginfo('url') .'/'. $project->post_name; ?>">
							<div class="related-image" style="background-image:url(<?php echo $url; ?>)"></div>
							<?php echo $project->post_title; ?>
						</a>
					</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>

	<?php if( in_array('proposal', $types) ): ?>
	<div id="overlay" class="overlay" style="display: none;">
		<div class="donate">
			<div class="close"><i class="fa fa-times"></i></div>
			<form method="get" action="<?php bloginfo('home'); ?>">
			<input type="hidden" name="donate" value="250">
			<h1>Doneer &euro;2,50 voor dit voorstel</h1>
			<p><input type="text" name="email" placeholder="hier jouw e-mailadres"></p>
			<h2>We sturen je de voorwaarden en betaalinformatie</h2>
			<button class="button-large" type="submit">Akkoord <i class="fa fa-play"></i></button>
			</form>
		</div>
	</div>
	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>