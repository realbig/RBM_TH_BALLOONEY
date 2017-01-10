<?php get_header(); ?>
<?php global $woo_options; ?>
					
	<div id="title-container" class="col-full post">
		<h1 class="title"><?php the_title(); ?></h1>
		<?php include( get_template_directory() . '/search-form.php' ); ?>
	</div>

    <div id="content" class="page col-full">

		<?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
		<div id="content-header">
		
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
				
			<div id="post-entries">
	            <div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ) ?></div>
	            <div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ) ?></div>
	            <div class="fix"></div>
	        </div><!-- #post-entries -->

	        <div class="fix"></div>
	        
    	</div><!-- #content-header   -->  	
		<?php } ?>  	

	    <div id="inner" class="col-full">
	    
		    <div id="main" class="col-full">
	    
	        <?php if (have_posts()) : $count = 0; ?>
	        <?php while (have_posts()) : the_post(); $count++; ?>
	        
				<div <?php post_class(); ?>>

                <?php echo woo_embed( 'width=534' ); ?>
               
                <?php if ( $portfolio_gallery && !woo_embed('')) { ?>
                	<div id="gallery">
					<?php
						$gallery = do_shortcode('[scrollGallery id=18]');
						
						if ( $gallery ) {
						
							// include('includes/gallery.php'); // Photo gallery
							
							$tpl_gallery = '';
							$tpl_gallery = locate_template( array( 'includes/gallery.php' ) );
							
							if ( $tpl_gallery ) {
							
								include( $tpl_gallery );
							
							} // End IF Statement
							
						} else {
							woo_image('key=portfolio-image&width=534&class=portfolio-img');  
						}
					?>
					</div>
					
					<?php } elseif ( !woo_embed('')) { ?><!-- End If portfolio_gallery -->
					
					<div id="gallery">
					<div>
<?php
  $gallery_id = get_post_meta( $post->ID, 'wpcf-nextgen-gallery-id', true); // Get gallery id from custom field data
  $catfish = 18;
  if( isset($gallery_id) ){ 
    echo "<div class=\"post-gallery\">";
    echo do_shortcode('[scrollGallery id="' .$gallery_id. '"]');
    echo "</div>";
  } 
?>
					</div>
					</div>
					<?php } ?>
					
					<?php $testimonial = get_post_meta($post->ID, 'testimonial', true); ?>
               		<?php $testimonial_author = get_post_meta($post->ID, 'testimonial_author', true); ?>
               		<?php $url = get_post_meta($post->ID, 'url', true); ?>

					<div id="portfolio-content">
						
						<?php the_tags( '<p class="tags">'.__( '', 'woothemes' ), ' ', '</p>' ); ?>
						
                    	<div>	
	                	<?php the_content(); ?>
	                	 <?php if ( $url ) { ?><a class="button" href="<?php echo $url; ?>"><?php _e( 'Visit Website', 'woothemes' ); ?></a><?php } ?>
	               	</div><!-- /.entry -->
	               	
	               	<?php if ( $testimonial) { ?>               
	               	<div id="testimonial">
	               	<h3><?php _e( 'Client Testimonial', 'woothemes' ); ?></h3>
	               	<div class="feedback">
	               		<div class="quotes">
	               			<div class="quote">
                        	<?php if ( $testimonial ) { ?><blockquote><p><?php echo $testimonial; ?></p></blockquote><?php } // End IF Statement ?>
                        <?php if ( $testimonial_author ) { ?><cite><?php echo $testimonial_author; ?></cite><?php } // End IF Statement ?>
                        <?php if ( $url ) { ?><a href="<?php echo $url; ?>"><?php echo $url; ?></a> &rarr;<?php } // End IF Statement ?>
                        	</div><!-- /.quote -->
                        </div><!-- /.quotes -->
                    </div><!-- /.feedback -->
                    <div class="feedback-bottom"></div>
	               	</div>
	               	<?php } ?><!-- End If -->
	               	
	               	</div><!-- /#portfolio-content -->
					<div class="fix"></div>
					<?php edit_post_link( __('{ Edit }', 'woothemes'), '<span class="small">', '</span>' ); ?>
                </div><!-- /.post -->
                                                                    
			<?php endwhile; else: ?>
				<div class="post">
                	<p><?php _e('Sorry, no posts matched your criteria.', 'woothemes') ?></p>
                </div><!-- /.post -->
            <?php endif; ?>  
	        
			</div><!-- #main -->
	
		</div><!-- /#inner -->
    </div><!-- #content -->
		
<?php get_footer(); ?>