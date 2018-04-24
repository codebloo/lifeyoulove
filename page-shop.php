<?php 
/* Template Name: Shop */

get_header(); ?>

<main role="main">


	<section class="page_content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3><?php the_title();?></h3>
						<?php the_content(); ?>
						</div>
				</div>
			</div>		
		<?php endwhile; endif; ?>
	</section>
</main>

<?php get_footer();?>