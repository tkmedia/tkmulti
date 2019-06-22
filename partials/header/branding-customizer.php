<div class="branding clearfix">
	<div id="site-title" class="assistive-text screen-reader-text"><?php bloginfo( 'name' ) ?></div>
	<div id="site-description" class="assistive-text screen-reader-text"><?php bloginfo( 'description' ) ?></div>
	<div class="header-logo desktop_logo Aligner">
	<?php
	// Displaying the custom logo with custom markup
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image( $custom_logo_id , 'full' );
	if ( has_custom_logo() ) { ?>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="לוגו <?php bloginfo( 'name' ); ?>" rel="home">
	    <?php echo $logo; ?>
	    </a>
	<?php } else { ?>
	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	<?php } ?>
	</div>
	<div class="header-logo mobile_logo">
	
	<?php if ( get_theme_mod( 'tkmulti_mobile_logo' ) ) : ?>
	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	        <img src="<?php echo get_theme_mod( 'tkmulti_mobile_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	    </a>
	    <?php else : ?>
	    <hgroup>
	        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
	    </hgroup>
	<?php endif; ?>
	</div>
	
	
	
	
</div>