<?php get_header(); ?>
	<main role="main">
		<section id="hero">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hero' );?>
			<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $post->ID; ?>">
			
			<div class="coach_content">
				<h3><?php the_field('coach_topic');?></h3>
				<h4><em>with</em> <?php the_excerpt();?></h4>
			</div>
		<?php endwhile; endif; ?>
		</section>

		<section id="coachDetails">
			<div class="coach_intro">
				<div class="container">
					<div class="row">
						<div class="col-6"><h3><em>Introducing</em> <?php the_excerpt();?></h3></div>
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

<?php 
global $product;
$id = $product->get_id(); 
$allaccess = "145"; ?>

<?php if( $id == $allaccess ):?>

 <form class="cart" action="http://lifeyoulove.co/product/gratitude/" method="post" enctype="multipart/form-data">
			<div class="quantity hidden">
		<input type="hidden" id="quantity_5aceeb2d31b53" class="qty" name="quantity" value="1">
	</div>
	
		<button type="submit" name="add-to-cart" value="<?php the_field('linked_product');?>" class="button button_single_access">Get All Access</button>		</form>								<span>$499 / once a year, access to all programs and app features</span>
<br/>
<a href="<?php bloginfo('url');?>/shop" class="button button_all_access">See all programs </a>

<?php else:?>

								<a href="<?php bloginfo('url');?>/?add-to-cart=145" class="button button_all_access">All Access</a>
								<span class="all_access">$<?php $price = get_post_meta( 145, '_regular_price', true); echo $price;?> / once a year, access to all programs and app features</span>
					
								 <form class="cart" action="http://lifeyoulove.co/product/gratitude/" method="post" enctype="multipart/form-data">
			<div class="quantity hidden">
		<input type="hidden" id="quantity_5aceeb2d31b53" class="qty" name="quantity" value="1">
	</div>
	
		<button type="submit" name="add-to-cart" value="<?php the_field('linked_product');?>" class="button button_single_access">Single Program</button>

			</form>								<span>$99 / once</span>


<?php endif;?>



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