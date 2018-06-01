<?php 
/* Template Name: Home */
get_header(); ?>

<main role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<section id="hero">
			<a href="<?php the_field('hero_button_link');?>" class="button gold"><?php the_field('hero_button_text');?></a>
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
		
		<section id="design" class="container">
			<div class="row">
				<div class="col-6">
					<h2><?php the_field('intro_title_text'); ?></h2>
				</div>
				<div class="col-6">
					<?php the_content(); ?>	
				</div>
			</div>
		</section>	
		
				<section id="coaches">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<h2><?php the_field('superminds_title'); ?></h2>
								<p class="title"><?php the_field('superminds_description'); ?></p>
							</div>
						</div>
					</div>
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
		
		<section id="mindset">
			<div class="container">
				<div class="row">
						<h2>Mindset. Made <em>simple</em>.</h2>
						<?php if( have_rows('mindset_box') ):?>
						<ul class="mindset_boxes clearfix">
							<?php while ( have_rows('mindset_box') ) : the_row();?>
								<li class="col-4 box_item">
									<?php $image = wp_get_attachment_image_src(get_sub_field('mindset_icon'), 'full'); ?>
									<img src="<?php echo $image[0]; ?>)" class="scale-with-grid" />
								
									<h3><?php the_sub_field('mindset_title');?></h3>
									<p><?php the_sub_field('mindset_description');?></p>
								</li>
							<?php endwhile;?>
						</ul>
					<?php endif;?>
					<a href="<?php the_field('quiz_button_link');?>" class="button"><?php the_field('quiz_button_text');?></a>
			</div>
		</div>
		</section>
		<section id="fundamentals">
			<div class="container">
				<div class="row">
					<div class="col-12">	
						<h2>Life Fundamentals,<br/>Designed <em>For You</em></h2>
						<p>We help you find what you’re looking for in life.</p>
<h1>
  <a href="" class="typewrite" data-period="2000" data-type='[ "Purpose", "Self Love", "Feminine Power", "Money" ]'>
    <span class="wrap"></span>
  </a>
</h1>
						<a href="<?php bloginfo('url');?>/routines" class="button">Discover You</a>
					</div>
				</div>
			</div>
		</section>

		<section id="appdownload">
					<?php if( have_rows('download_app_slider') ): $i = 0; while ( have_rows('download_app_slider') ) : the_row();?>
					<?php $image = wp_get_attachment_image_src(get_sub_field('background_image'), 'full'); ?>
					<div class="download_app_slide download_app_slide-<?php echo (($i++) % 2) + 1 ?>" style="background-image:url(<?php echo $image[0]; ?>);">
					
						<div class="download_item_content">
							<h2><?php the_sub_field('download_title');?></h2>
							<p><?php the_sub_field('download_description');?></p>
							<a href="<?php the_field('app_download_link' , 'option');?>" class="button">Download The App</a>
						</div>
						
					</div>
				<?php endwhile; $i++; endif;?>

			
		</section>	
		
		
	<?php endwhile; endif; ?>
</main>
<script>

	jQuery('#appdownload').slick({
		dots: false,
		infinite:false
	});
	
	jQuery('#hero ul').slick({
		dots: false,
		arrows:false,
		autoplay: true,
  		autoplaySpeed: 3000
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