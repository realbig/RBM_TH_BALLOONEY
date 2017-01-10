<?php global $woo_options; ?>
	<?php 
		$total = 4;
		if ( isset( $woo_options['woo_footer_sidebars'] ) ) { $total = $woo_options['woo_footer_sidebars']; }
			   
		if ( ( woo_active_sidebar( 'footer-1' ) ||
			   woo_active_sidebar( 'footer-2' ) || 
			   woo_active_sidebar( 'footer-3' ) || 
			   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) : 
  	?>
	<div id="footer-widgets" class="col-full col-<?php echo $total; ?>">
		
		<?php $i = 0; while ( $i < $total ) : $i++; ?>			
			<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

		<div class="block footer-widget-<?php echo $i; ?>">
        	<?php woo_sidebar( 'footer-' . $i ); ?>    
		</div>
		        
	        <?php } ?>
		<?php endwhile; ?>
        		        
		<div class="fix"></div>

	</div><!-- /#footer-widgets  -->
    <?php endif; ?>
    
	<div id="footer" class="col-full">
	
		<div id="copyright" class="col-left">
		<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
		
				echo stripslashes( do_shortcode( $woo_options['woo_footer_left_text'] ) );	

		} else { ?>
			<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ) ?></p>
		<?php } ?>
		</div>
		
		<div id="credit" class="col-right">
        <?php if( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ){
		
        	echo stripslashes( do_shortcode( $woo_options['woo_footer_right_text'] ) );
       	
		} else { ?>
			<!--- HI THERE --->
		<?php } ?>
		</div>
		
	</div><!-- /#footer  -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>