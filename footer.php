</div>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<?php dynamic_sidebar('Footer Left');?>
				<?php if( have_rows('social_media_link', 'option') ):?>
					<ul class="social_media_links">
						<?php while ( have_rows('social_media_link', 'option') ) : the_row();?>
							<li>
								<a href="<?php the_sub_field('social_link');?>" target="_blank">
									<i class="fab fa-<?php the_sub_field('social_icon');?>"></i>
								</a>
							</li>
						<?php endwhile;?>
					</ul>
				<?php endif;?>
				
			</div>
			<div class="col-6"><?php dynamic_sidebar('Footer Right');?></div>
			<div class="col-12">
				<?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu-class' => 'footer_menu nav', 'link_before' => '<span>', 'link_after' => '</span> <span class="nav_div">|</span>', 'container_class' => 'footer_nav')); ?>
				<p class="copyright"><?php bloginfo('name'); ?>, LLC. <? echo date('Y');?>  &copy; All rights reserved.</p>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>
</body>
</html>