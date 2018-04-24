<?php 
/* Template Name: WooCommerce pages */

get_header(); ?>

<main role="main">
	<section id="hero">
		<?php if(get_field('hero_button_text')):?>
			<a href="<?php the_field('hero_button_link');?>" class="button gold"><?php the_field('hero_button_text');?></a>
		<?php endif;?>
		<?php $images = get_field('hero_slide'); $size = 'full'; if( $images ): ?>
		    <ul>
		        <?php foreach( $images as $image ): ?>
		            <li>
		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
		            </li>
		        <?php endforeach; ?>
		    </ul>
		<?php endif; ?>
	</section>	

	<section class="page_content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2><?php the_title();?></h2>
</div>
						<?php the_content(); ?>
						</div>
				</div>
			</div>		
		<?php endwhile; endif; ?>
	</section>
</main>

<?php get_footer();?>