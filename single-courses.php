<?php get_header(); ?>
<main role="main">
	<section id="hero">
		<ul>
			<li>		
		      <img src="<?php the_post_thumbnail_url('hero');?>" class="scale-with-grid" />
		     </li>
		 </ul>	
	</section>
	
	<section id="blogSingle" class="container">
	<div class="row">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>			
		<div class="col-8">
			<article class="single_blog">
				<h2><?php the_title();?></h2>					
				<?php the_content(); ?>
			</article>
		</div>
		<aside class="col-4">
			<?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?>
		</aside>
	<?php endwhile; endif; ?>
	</div>
	</section>
</main>

		


<?php get_footer(); ?>