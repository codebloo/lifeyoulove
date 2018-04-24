<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			
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
							
								<a href="<?php bloginfo('url');?>/?add-to-cart=<?php the_field('linked_product');?>" class="button button_single_access">Single Program</a>
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


		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
