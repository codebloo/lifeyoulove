<?php get_header(); ?>
	<main role="main">
		<section id="hero">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'scale-with-grid' ) );?>
			
			<div class="coach_content">
				<h3><?php the_field('coach_topic');?></h3>
				<h4><em>with</em> <?php the_title();?></h4>
			</div>
		<?php endwhile; endif; ?>
		</section>

		<section id="coachDetails">
			<div class="coach_intro">
				<div class="container">
					<div class="row">
						<div class="col-6"><h3><em>Introducing</em> <?php the_title();?></h3></div>
						<div class="col-6">
							<?php if (have_posts()): while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>	
				</div>
			</div>
			<div class="coach_routines">
				<div class="container">
					<div class="row">
					
						<div class="coach_column">
							<div class="routine_content">
								<h3>3 Weeks</h3>
								<?php the_field('3_weeks_text');?>
							</div>
						</div>
						<div class="coach_column">
							<div class="routine_content">
								<h3>21-Daily Routines</h3>
								<?php the_field('21_routines_text');?>
							</div>	
						</div>
						<div class="coach_column last">
							<div class="routine_content">
								<a href="<?php bloginfo('url');?>/?add-to-cart=145" class="button button_all_access">All Access</a>
								<span class="all_access">$499 / once a year, access to all programs and app features</span>
							
<?php 
    global $post;
    $post_slug=$post->post_name;
?>

			<form class="cart" action="<?php bloginfo('url');?>/coaches/<?php echo $post_slug ?>" method="post" enctype="multipart/form-data">
			<div class="quantity hidden">
		<input type="hidden" id="" class="qty" name="quantity" value="1">
	</div>
	
		<button type="submit" name="add-to-cart" value="<?php the_field('linked_product');?>" class="button button_single_access">Single Program</button>

			</form>	
								<span>$99 / once</span>



							</div>	
						</div>
					</div>	
				</div>
			</div>	
			<div class="coach_stages row">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="stages_intro">
								<?php the_field('stages_intro');?>
							</div>
						</div>
					</div>
						<?php if( have_rows('coach_stages') ): while ( have_rows('coach_stages') ) : the_row();?>
						<div class="single_stage row">
							<span class="col_number"><?php the_sub_field('stage_number');?></span>
							<p class="stage_info"><strong><?php the_sub_field('stage_title');?></strong>
							<?php the_sub_field('stage_description');?></p>
						</div>
						<?php endwhile; endif;?>
					</div>
				</div>
			<div>	
		</section>	
	</main>
<?php get_footer(); ?>