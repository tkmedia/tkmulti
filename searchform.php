<?php
/**
 * Search form
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/
?>

<div class="search-form-container searchform">
	<form role="search" id="search-form" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="search-table">	
			<div class="search-button">
		        <button type="submit" id="search-submit"><span class="screen-reader-text"><?php _e('Search', 'tkmulti'); ?></span><i class="far fa-search"></i></button>
			</div>
			<div class="search-field">
				<label class="screen-reader-text" for="search-input"><?php _e('Search', 'tkmulti'); ?></label>
		        <input type="search" placeholder="<?php _e('Search', 'tkmulti'); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
			</div>
		</div>
	</form>
</div>