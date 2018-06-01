<?php 

/* Template Name: Our Story */

get_header(); ?>

<main role="main">
	<section id="hero">
		<div class="hero_content">
			<div class="hero_fields">
				<?php if(get_field('hero_headline')):?>
					<h2><?php the_field('hero_headline');?></h2>		
				<?php endif;?>			
				<?php if(get_field('hero_subtext')):?>
					<p><?php the_field('hero_subtext');?></p>		
				<?php endif;?>			
				<?php if(get_field('hero_button_text')):?>
					<div class="button_wrapper">	
						<a href="<?php the_field('hero_button_link');?>" class="button gold"><?php the_field('hero_button_text');?></a>		
					</div>
				<?php endif;?>		
			</div>
		</div>		<?php $images = get_field('hero_slide'); $size = 'hero'; if( $images ): ?>
		    <ul>
		        <?php foreach( $images as $image ): ?>
		            <li>
		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
		            </li>
		        <?php endforeach; ?>
		    </ul>
		<?php endif; ?>
	</section>
	<section class="story_intro">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="container">
				<div class="row">
					<div class="col-6"><h2><?php the_title();?></h2></div>
					<div class="col-6"><?php the_content(); ?></div>
				</div>
			</div>		
		<?php endwhile; endif; ?>		
	</section>
	<?php $oneimage = wp_get_attachment_image_src(get_field('photo_one'), 'full'); ?>
	<section class="photo_one photo_row" style="background-image:url('<?php echo $oneimage[0]; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-6 hidden-sm"></div>
				<div class="col-6">
					<?php the_field('photo_one_text_right');?>
				</div>
			</div>
		</div>
	</section>
	<?php $twoimage = wp_get_attachment_image_src(get_field('photo_two'), 'full'); ?>
	<section class="photo_two photo_row" style="background-image:url('<?php echo $twoimage[0]; ?>');">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<?php the_field('photo_two_text_left');?>
				</div>
			</div>
		</div>
	</section>
	<section class="chart">
		<div class="container">
			<div class="row">
				<div class="col-2 hidden-sm"></div>
				<div class="col-8">
					<h3><?php the_field('chart_title');?></h3>
					<?php the_field('chart_intro');?>
				</div>
					
					<div class="col-12">
					<?php $image = wp_get_attachment_image_src(get_field('chart_image'), 'full'); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('chart_image')) ?>" class="scale-with-grid" />
					
					<a href="<?php bloginfo('url');?>/product/all-access" class="button">Get Good at Life</a>
				</div>
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