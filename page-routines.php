<?php 
/* Template Name: Routines */
get_header(); ?>

<main role="main">
	<section id="hero">
			<?php if(get_field('hero_button_text')):?>
				<a href="<?php the_field('hero_button_link');?>" class="button gold"><?php the_field('hero_button_text');?></a>
			<?php endif;?>	
			<?php $images = get_field('hero_slide'); $size = 'hero'; if( $images ): ?>
			    <ul>
			        <?php foreach( $images as $image ): ?>
			            <li>
			            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
		</section>	
		<section class="science_intro">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="container">
					<div class="row">
						<div class="col-6"><h2><?php the_title();?></h2></div>
						<div class="col-6"><?php the_content(); ?></div>
					</div>
				</div>		
			<?php endwhile; endif; ?>		
		</section>
		
		
				<section id="coaches">
						<?php
						$args = array(
						  'post_type'   => 'product',
						  'post_status' => 'publish',
						  'post__not_in' => array(145)
						 );
						$vols = new WP_Query( $args );
						if( $vols->have_posts() ) :
				
						?>
							<?php $i = 0;?>
						
								<ul class="coach_slider">
									<?php while( $vols->have_posts() ) : $vols->the_post(); $slug = basename(get_permalink());?>
										<li class="item-<?php echo (($i++) % 4) + 1 ?> <?php echo $slug;?>">
											<a href="<?php the_permalink();?>">
											<?php if ( has_post_thumbnail() ) {
												the_post_thumbnail('blogpost', array('class' => 'scale-with-grid'));
											}?>
											<div class="coach_content">
												<h3>Get good at <?php the_title();?></h3>
												<h4><em>with</em> <?php the_excerpt();?></h4>
											</div>
											</a>
										</li>
								
								    <?php endwhile; wp_reset_postdata(); ?>
								</ul>
							 <?php $i++;?>
						<?php endif; ?>
				</section>

<section class="routines_boxes">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="featured_routine single_routine_box">					
<h3>Life of <em><?php the_field('featured_routine');?></em></h3>
					<p><?php the_field('featured_routine_desc');?></p>
					
					<?php if(get_field('featured_routine_image')):?>
<?php $image = wp_get_attachment_image_src(get_field('featured_routine_image'), 'full'); ?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_field('featured_routine_desc');?>" class="scale-with-grid" />
					<?php else:?>
						<img src="http://placehold.it/1334x515.jpg" class="scale-with-grid" />
					<?php endif;?>

			</div>
			</div>
		</div>
		<div class="row">
			<?php if( have_rows('routines_on_page') ): while( have_rows('routines_on_page') ): the_row(); ?>
		<div class="col-6">
			<div class="single_routine_box">
				<h3>Life of <em><?php the_sub_field('routine_name');?></em></h3>
				<p><?php the_sub_field('routine_description');?></p>
					<?php if(get_sub_field('routine_image')):?>
						<?php $image = wp_get_attachment_image_src(get_sub_field('routine_image'), 'full'); ?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('routine_description');?>" class="scale-with-grid" />
					<?php else: ?>
						<img src="http://placehold.it/654x515.jpg" class="scale-with-grid" />
					<?php endif;?>
			</div>		
		</div>	
		<?php endwhile; endif;?>
		</div>
	</div>
</section>

</main>
<script>
	jQuery('#appdownload').slick({
		dots: false,
		infinite:false
	});
	
	jQuery('#hero ul').slick({
		dots: false,
		arrows:false
	});
	
	jQuery('.coach_slider').slick({
		dots: true,
  	   slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '40px',
				  slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
		
	});
</script>	

<?php get_footer();?>