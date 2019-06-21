<?php

if ( ! function_exists( 'tkmulti_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time with out author.
 *
 * @since tkmulti 1.0
 */
function tkmulti_posted_on() {
    printf( __( 'פורסם בתאריך <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'tkmulti' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
}
endif;

if ( ! function_exists( 'tkmulti_posted_on_author' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since tkmulti 1.0
 */
function tkmulti_posted_on_author() {
    printf( __( 'פורסם בתאריך <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> על ידי <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'tkmulti' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'צפייה בכל הפוסטים של %s', 'tkmulti' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
}
endif;
 
/**
 * Returns true if a blog has more than 1 category
 *
 * @since tkmulti 1.0
 */
function tkmulti_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
        // Create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );
 
        // Count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );
 
        set_transient( 'all_the_cool_cats', $all_the_cool_cats );
    }
 
    if ( '1' != $all_the_cool_cats ) {
        // This blog has more than 1 category so tkmulti_categorized_blog should return true
        return true;
    } else {
        // This blog has only 1 category so tkmulti_categorized_blog should return false
        return false;
    }
}
 
/**
 * Flush out the transients used in tkmulti_categorized_blog
 *
 * @since tkmulti 1.0
 */
function tkmulti_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'tkmulti_category_transient_flusher' );
add_action( 'save_post', 'tkmulti_category_transient_flusher' );
		

if ( ! function_exists( 'tkmulti_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since tkmulti 1.0
 */
function tkmulti_content_nav( $nav_id ) {
    global $wp_query, $post;
 
    // Don't print empty markup on single pages if there's nowhere to navigate.
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );
 
        if ( ! $next && ! $previous )
            return;
    }
 
    // Don't print empty markup in archives if there's only one page.
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;
 
    $nav_class = 'site-navigation paging-navigation';
    if ( is_single() )
        $nav_class = 'site-navigation post-navigation';
 
    ?>
    <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
        <h2 class="assistive-text"><?php _e( 'ניווט בעמודים', 'tkmulti' ); ?></h2>
 
    <?php if ( is_single() ) : // navigation links for single posts ?>
 
        <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'קישור לעמוד הקודם', 'tkmulti' ) . '</span> %title' ); ?>
        <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'קישור לעמוד הבא', 'tkmulti' ) . '</span>' ); ?>
 
    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
 
        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> הקודם', 'tkmulti' ) ); ?></div>
        <?php endif; ?>
 
        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'הבא <span class="meta-nav">&rarr;</span>', 'tkmulti' ) ); ?></div>
        <?php endif; ?>
 
    <?php endif; ?>
 
    </nav><!-- #<?php echo $nav_id; ?> -->
    <?php
}
endif; // tkmulti_content_nav