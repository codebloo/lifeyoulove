<?php get_header(); ?>
<main role="main">
	<section id="hero">
		<?php $images = get_field('hero_slide'); $size = 'hero'; if( $images ): ?>
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
					<?php $blog_header = wp_get_attachment_image_src(get_field('blog_header' , 'option'), 'hero'); ?>
					<img src="<?php echo $blog_header[0]; ?>)" class="scale-with-grid" />
		        </li>
		    </ul>
		<?php endif; ?>
	</section>
	<section class="cat_list">
		<div class="container">
			<div class="row">
				<div class="col-12"><h2>Latest Articles</h2>					
<?php wp_nav_menu( array( 'theme_location' => 'blog-menu','link_before' => '<span>', 'link_after' => '</span>','menu_class' => 'menu') ); ?>
				</div>
			</div>
		</div>
	</section>
	<section id="blogSingle" class="container">
		<div class="row">
			<div class="col-12">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article class="single_blog">
					<h2><?php the_title();?></h2>
					<div class="post_meta">
						<i class="fa fa-calendar"></i> <?php the_time('l, F jS, Y') ?> &nbsp;
						<i class="fa fa-tag"></i> <?php the_category(', ') ?>
					</div>
					
					<?php the_content(); ?>
				</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
</main>

		


<?php get_footer(); ?>