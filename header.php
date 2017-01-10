<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( $woo_options[ 'woo_feed_url' ] ) { echo $woo_options[ 'woo_feed_url' ]; } else { echo get_bloginfo_rss( 'rss2_url' ); } ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
<?php woo_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>
<div id="wrapper">

	<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>

	<div id="top">
		<div class="col-full">
			<div id="number">
				Call us at: (517) 962-5939
			</div>
		<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
			<div id="Addresses">
		 		<a href="https://maps.google.com/maps?ie=UTF8&cid=9942572829656703198&q=Ballooney+Bin&iwloc=A&gl=US&hl=en">Directions: 3465 Ann Arbor Rd. Jackson, MI 49202</a></br>
				<a href="mailto:ballooneybin@hotmail.com ?subject=Additional Infomation about">Email: ballooneybin@hotmail.com </a>     
			</div></div>
			
	</div><!-- /#top -->

    <?php } ?>

	<div id="header-container">
		<div id="header" class="col-full">

			<div id="logo">

			<?php if ( $woo_options['woo_texttitle'] != 'true' ) : $logo = $woo_options['woo_logo']; ?>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'description' ); ?>">
					<img src="<?php if ( $logo ) echo $logo; else { echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
	        <?php endif; ?>

	        <?php if( is_singular() && !is_front_page() ) : ?>
				<span class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></span>
	        <?php else : ?>
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	        <?php endif; ?>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>

			</div><!-- /#logo -->

			<div id="navigation" class="fr">

		<?php
if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
	wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
} else {
?>
		<ul id="main-nav" class="nav fl">
			<?php
	if ( get_option( 'woo_custom_nav_menu' ) == 'true' ) {
		if ( function_exists( 'woo_custom_navigation_output' ) )
			woo_custom_navigation_output( "name=Woo Menu 1" );

	} else { ?>

				<?php if ( is_page() ) $highlight = "page_item"; else $highlight = "page_item current_page_item"; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'woothemes' ) ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>

			<?php } ?>
		</ul><!-- /#nav -->
		<?php } ?>
		<?php if ( $woo_options['woo_nav_rss'] == 'true' ) { ?>
		<ul class="rss fr">
			<li class="sub-rss"><a href="<?php if ( $woo_options['woo_feed_url'] ) { echo $woo_options['woo_feed_url']; } else { echo get_bloginfo_rss( 'rss2_url' ); } ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-rss.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a></li>
		</ul>
		<?php } ?>

	</div><!-- /#navigation -->

		</div><!-- /#header -->
	</div><!-- /#header-container -->
    <div id="shadow"></div>