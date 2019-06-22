<div class="header_menu site-header clearfix dt-mobile-header">
	<div id="header-menu-wrapper" class="page-header-menu">
		<div id="header-menu-wrapper-inner" class="menu-container container clearfix">
			
			<nav id="header-menu"  class="nav nav-primary menu collapse navbar-collapse collapsed row-flex" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Primary menu', 'tkmulti' ); ?>">
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
			</nav>
			<div class="nav-divider"></div>
			<nav id="header-menu-secondary"  class="nav nav-secondary menu collapse navbar-collapse collapsed row-flex" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php _e( 'Secondary menu', 'tkmulti' ); ?>">
			<input id="main-menu-state" type="checkbox" />

			<?php
			wp_nav_menu( array (
					'theme_location'    => 'secondary',
					'depth'             => 3,
					'container'         => '',
					'container_id'      => '',
					'container_class'   => '',
					'menu_id'      => 'main-menu-secondary',
					'menu_class'        => 'header-main-menu main-navigation',
					//'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
					'walker'         => new dynamicWalkerNavMenu(),
				)
			);
			?>	
			</nav>					

			<div id="nav-search" class="header_top_bar_left_col header_search">
				<div class="search_bar">
				<?php get_search_form(); ?>
				</div>
			</div>

			<?php 
			$header_phone = get_field('header_phone','option');
			$header_main_email = get_field('header_main_email','option');
			$header_email_icon = get_field('header_email_icon','option');
			$social_links = get_field('social_links','option');	
			if( have_rows('social_links','option') ): ?>
			<div id="nav-info">
				<ul class="social-bar">
					<?php while ( have_rows('social_links','option') ) : the_row(); 
						$social_links_icon = get_sub_field('social_links_icon');
						$social_links_link = get_sub_field('social_links_link');
					?>
						<li class="social-item social_link">
							<a href="<?php echo $social_links_link; ?>" target="_blank" class="social_media">
								<?php echo $social_links_icon; ?>
							</a>
						</li>
				    <?php endwhile; ?>
				</ul>
			</div>
			<?php endif; ?>
								
		</div>
	</div>
</div>
