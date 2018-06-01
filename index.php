<?php get_header(); ?>

<main role="main">
 <div class="container">
			<div class="row">
				<div class="col-12">
<?php $the_query = new WP_Query( array('posts_per_page' => 1,  'tag' => 'featured' ) );  
if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
<section class="featured_post">
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero' );?>
	<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $post->ID; ?>" class="scale-with-grid">

	<div class="featured_content">
		<article>
			<div class="article_feature">
				<h2><?php the_title();?></h2>
				<a href="<?php the_permalink();?>" class="button">Read More</a>
			</div>
		</article>
	</div>
</section>
<?php endwhile;endif; ?>
</div>
</div>
</div>

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
				<?php
				/*
				 * Loop through Categories and Display Posts within
				 */
				$post_type = 'post';

				// Get all the taxonomies for this post type
				$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

				foreach( $taxonomies as $taxonomy ) :

				    // Gets every "category" (term) in this taxonomy to get the respective posts
				    $terms = get_terms( $taxonomy );

				    foreach( $terms as $term ) : ?>

				        <?php
				        $args = array(
				                'post_type' => $post_type,
				                'posts_per_page' => 2, 
				                'tax_query' => array(
				                    array(
				                        'taxonomy' => $taxonomy,
				                        'field' => 'slug',
				                        'terms' => $term->slug,
				                    )
				                )


				            );
				        $posts = new WP_Query($args);

				        if( $posts->have_posts() ): ?> 
    <section class="cat_<?php echo $term->name; ?> clearfix">
				       <div class="col-12"><h2 class="cat_title"><a href="<?php bloginfo('url');?>/category/<?php echo $term->name; ?>"><?php echo $term->name; ?></a></h2></div>
     
				        <?php while( $posts->have_posts() ) : $posts->the_post(); ?>

		 				<div class="col-6">
		 					<article class="post" id="post-<?php the_ID(); ?>">
		 						<a href="<?php the_permalink();?>" class="post_image">
		 						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogpost' );?>
	<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $post->ID; ?>" class="scale-with-grid">
		 						</a>
		 						<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
		 					</article>
		 				</div>
			                       

				        <?php endwhile;?>
						<div class="col-12"> 
							<a href="<?php bloginfo('url');?>/category/<?php echo $term->name; ?>" class="button">View all posts in <?php echo $term->name; ?></a>
							<hr />
						</div>
</section>
					
					<?php endif; endforeach; endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer();?>