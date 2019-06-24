<div class="header_menu site-header clearfix dt-mobile-header">
	<div id="header-menu-wrapper" class="page-header-menu">
		<div id="header-menu-wrapper-inner" class="menu-container container clearfix">
			<nav id="header-menu"  class="nav nav-primary menu collapse navbar-collapse collapsed" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Main Nav', 'tkmulti' ); ?>">
			<input id="main-menu-state" type="checkbox" />
			<?php				
				wp_nav_menu( array (
						'theme_location'    => 'primary',
						'depth'             => 3,
						'container'         => '',
						'container_id'      => '',
						'container_class'   => '',
						'menu_id'      => 'main-menu',
						'menu_class'        => 'header-main-menu main-navigation',
						//'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
						'walker'         => new dynamicWalkerNavMenu(),
					)
				);
				
			?>						
		</div>
	</div>
</div>
