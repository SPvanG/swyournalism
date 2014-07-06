<?php
/*
Template Name: Timeline
*/
get_header();
?>

<div class="container timeline">
	<div class="header">
		<div class="project-title">Historie van dit voorstel</div>
		<a class="backlink" href="javascript:history.back();"><i class="fa fa-chevron-circle-left"></i> Ga terug naar het voorstel</a>
	</div>

	<div class="project-info">
		<div class="info-type">
			<div class="number">160</div>
			<div class="description">mensen doneerden</div>
		</div>
		<div class="info-type">
			<div class="number">&euro;2500</div>
			<div class="description">is het doel</div>
		</div>
		<div class="info-type">
			<div class="number">12 uren</div>
			<div class="description">te gaan</div>
		</div>
		<div class="progressbar">
			<div class="completed" style="width: calc(32% - 10px);">32%</div>
		</div>
		<button id="donatenow" class="button">doneer <i class="fa fa-play"></i></button>
	</div>

	<div class="content">
		<img class="timeline" src="<?php bloginfo('template_url'); ?>/images/timeline.png" alt="">	
	</div>
</div>

<div id="overlay" class="overlay" style="display: none;">
	<div class="donate">
		<div class="close"><i class="fa fa-times"></i></div>
		<form method="get" action="<?php bloginfo('url'); ?>/bedankt">
		<input type="hidden" name="donate" value="250">
		<h1>Doneer &euro;2,50 voor dit voorstel</h1>
		<p><input type="text" name="email" placeholder="hier jouw e-mailadres"></p>
		<h2>We sturen je de voorwaarden en betaalinformatie</h2>
		<button class="button-large" type="submit">Akkoord <i class="fa fa-play"></i></button>
		</form>
	</div>
</div>

<?php get_footer(); ?>
