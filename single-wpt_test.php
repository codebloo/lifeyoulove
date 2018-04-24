<?php get_header(); ?>
<main role="main">
		<section class="container">
		<div class="row">
			<div class="col-12">
			<h2>	<?php the_title(); ?></h2>
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article class="single_blog">
						<?php the_content(); ?>
					</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
</main>

		


<?php get_footer(); ?>