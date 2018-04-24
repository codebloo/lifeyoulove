<?php 

/* Template Name: Science */

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
	
	<section class="science_boxes">
			<div class="row">
				<?php if( have_rows('boxes') ): while ( have_rows('boxes') ) : the_row();?>
				<div class="science_box" style="background-color:<?php the_sub_field('box_colour');?>">
					<h3><?php the_sub_field('box_title');?></h3>
					<p><?php the_sub_field('box_content');?></p>
				</div>
			<?php endwhile; endif; ?>
			</div>
	</section>
	
	<section class="science_items">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>The Science of <em>Heart</em>.</h2>
				</div>
			</div>
			<div class="row">
				<?php if( have_rows('science_items') ): while ( have_rows('science_items') ) : the_row();?>
				<div class="col-4">
					<?php $image = wp_get_attachment_image_src(get_sub_field('science_icon'), 'full'); ?>
					<div class="single_science_item">
						<img src="<?php echo $image[0]; ?>)" class="scale-with-grid" />
						<h3><?php the_sub_field('science_title');?></h3>
						<p><?php the_sub_field('science_text');?></p>
					</div>
				</div>
			<?php endwhile; endif; ?>
			</div>
			
			<div class="row">
					<div class="col-2"></div>
				<?php if( have_rows('science_items_row_2') ): while ( have_rows('science_items_row_2') ) : the_row();?>
				<div class="col-4">
					<?php $image = wp_get_attachment_image_src(get_sub_field('science_icon'), 'full'); ?>
					<div class="single_science_item">
						<img src="<?php echo $image[0]; ?>)" class="scale-with-grid" />
						<h3><?php the_sub_field('science_title');?></h3>
						<p><?php the_sub_field('science_text');?></p>
					</div>
				</div>
			<?php endwhile; endif; ?>
			</div>
			
			<div class="row">
				<div class="col-4"></div>
				<?php if( have_rows('science_items_row_3') ): while ( have_rows('science_items_row_3') ) : the_row();?>
				<div class="col-4">
					<?php $image = wp_get_attachment_image_src(get_sub_field('science_icon'), 'full'); ?>
					<div class="single_science_item">
						<img src="<?php echo $image[0]; ?>)" class="scale-with-grid" />
						<h3><?php the_sub_field('science_title');?></h3>
						<p><?php the_sub_field('science_text');?></p>
					</div>
				</div>
			<?php endwhile; endif; ?>
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