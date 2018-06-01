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
	<section class="cat_list">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>Latest Articles</h2>					
					<?php wp_nav_menu( array( 'theme_location' => 'blog-menu','link_before' => '<span>', 'link_after' => '</span>','menu_class' => 'menu') ); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="blog_entries">
		<div class="container">
			<div class="row">	
				    
				       <div class="col-12">
						<h2 class="cat_title"><?php $tax = $wp_query->get_queried_object(); echo ''. $tax->name . '';?></h2></div>

     
				      	<?php if(have_posts()) : $i = 0; while(have_posts()) : the_post(); ?>
		 				<div class="col-6 item-<?php echo (($i++) % 2) + 1 ?>">
		 					<article class="post" id="post-<?php the_ID(); ?>">
		 						<a href="<?php the_permalink();?>" class="post_image">
									<img src="<?php the_post_thumbnail_url('blogpost'); ?>" class="scale-with-grid"/>
		 						</a>
		 						<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
		 					</article>
		 				</div>
			                       

				        <?php endwhile; $i++; endif; ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer();?>