<div class="no-results_col col-xs-12"> 
 <article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h2 class="entry-title no-results-title"><?php _e( 'לא נמצא', 'tkmulti' ); ?></h2>
    </header><!-- .entry-header -->
 
    <div class="entry-content no-results-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
        
	        <p><?php printf( __( 'מוכנים לפרסם את הפוסט הראשון שלכם? <a href="%1$s">התחל כאן</a>.', 'tkmulti' ), admin_url( 'post-new.php' ) ); ?></p>
  
        <?php elseif ( is_search() ) : ?>
        
	        <p><?php _e( 'מצטערים, לא נמצאה תוצאה עבור החיפוש שלך. אנא נסו שנית עם מילות חיפוש אחרות.', 'tkmulti' ); ?></p>
 
			<div class="no-results-search">  
            <?php get_search_form(); ?>
 
			</div>
 
        <?php else : ?>
        
	        <p><?php _e( 'מצטערים אך העמוד שחיפשת לא נמצא. אנא נסו לבצע חיפוש בשדה החיפוש.', 'tkmulti' ); ?></p>
 
			<div class="no-results-search">  
            <?php get_search_form(); ?>
 
			</div>
			
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
</div>