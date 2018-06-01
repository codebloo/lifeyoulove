<?php get_header(); ?>

<main role="main">
<div class="container">
			<div class="row">
				<div class="col-12">	
<section id="hero">
	  <ul>
		 <li>
		<?php if ( has_post_thumbnail() ):?>
				<img src="<?php the_post_thumbnail_url('large');?>" class="scale-with-grid" />

		<?php else: ?>	
				<?php $blog_header = wp_get_attachment_image_src(get_field('blog_header' , 'option'), 'hero'); ?>
				<img src="<?php echo $blog_header[0]; ?>)" class="scale-with-grid" />
		  	<?php endif; ?>
		            </li>
		       	</ul>
			
	</section>
</div></div></div>
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
						<i class="fa fa-tag"></i> <?php the_category(', ') ?>  &nbsp;
						<i class="fas fa-pencil-alt"></i> <?php the_field('post_author_name');?>
					</div>
					
					<?php the_content(); ?>
				</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</section>
</main>

		


<?php get_footer(); ?>