<?php get_header(); ?>

<main role="main">
	<section id="hero">
	
		    <ul>
		     	<li>
					<?php $blog_header = wp_get_attachment_image_src(get_field('blog_header' , 'option'), 'full'); ?>
					<img src="<?php echo $blog_header[0]; ?>)" class="scale-with-grid" />
		        </li>
		    </ul>
	

	</section>
	
	<section class="blog_entries">
		<div class="container">
			<div class="row">	
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		 				<div class="col-4">
		 					<article class="post" id="post-<?php the_ID(); ?>">
		 						<a href="<?php the_permalink();?>" class="post_image">
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogpost' );?>
	<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $post->ID; ?>" class="scale-with-grid">

		 						</a>
		 						<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>



<?php if(is_user_logged_in() ):?>
<a href="<?php the_permalink();?>" class="button">Go To Course</a>
<?php else:?>

<a href="<?php bloginfo('url');?>/?add-to-cart=<?php the_field('product_id');?>" class="button">Buy this course</a>
<?php endif;?>		 					

</article>
		 				</div>
			                       

				        <?php endwhile; endif;?>
						
				
			</div>
		</div>
	</section>
</main>

<?php get_footer();?>