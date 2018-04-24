<?php get_header(); ?>
<main role="main">
	<section id="hero">
		<?php $images = get_field('hero_slide'); $size = 'full'; if( $images ): ?>
		    <ul>
		        <?php foreach( $images as $image ): ?>
		            <li>
		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
		            </li>
		        <?php endforeach; ?>
		    </ul>
		<?php else: ?>	
		    <ul>
		     	<li>
					<?php $blog_header = wp_get_attachment_image_src(get_field('blog_header' , 'option'), 'full'); ?>
					<img src="<?php echo $blog_header[0]; ?>)" class="scale-with-grid" />
		        </li>
		    </ul>
		<?php endif; ?>
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