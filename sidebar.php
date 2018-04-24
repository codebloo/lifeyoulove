<div id="sidebar">
<?php
		global $post;
		$id = $post->ID;
		$sidebar = get_post_meta($id, 'sidebar', true);
		
		if($sidebar != '') {
			dynamic_sidebar($sidebar);
		
		} else {
			if ( ! dynamic_sidebar( 'Default' )) {?>
			
			<!--...-->
			
		<?php	
			}
					
		}
	
	?>	


</div>
