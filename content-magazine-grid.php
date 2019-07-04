<?php
/**
 * @package tkmedia_theme
 * @since tkmedia_theme 1.0
 */
?>
<div class="magazine_page_grid_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
	<div class="magazine_page_item_container">
		<div class="magazine_page_item_img">
			<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmstarter' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php echo get_the_post_thumbnail($post->ID, 'block-300'); ?>
				<div class="magazine_page_item_inner">
					<div class="magazine_grid_item_text">	
						<h3 itemprop="name" class="magazine_grid_item_title"><?php the_title(); ?></h3>
					</div>
				</div>
			</a>
		</div>	
	</div>
</div>
