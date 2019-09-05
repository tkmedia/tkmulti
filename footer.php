	</main><!-- page content #main_content -->


<footer role="contentinfo" class="clearfix">
	<div class="footer-back-top wrap"><a href="#" class="cd-top" id="GoToTop"><span class="screen-reader-text">חזרה לראש העמוד</span><i class="fa fa-angle-up"></i></a></div>
	<?php get_template_part( 'partials/footer/footer', 'main' ); ?>					
</footer>

</div><!-- page wrapper #page -->

<?php if( current_user_can("editor") || current_user_can("administrator") ) : 
if( is_tax() || is_category() ) :
	$editLink = get_edit_tag_link(get_queried_object()->term_id, get_queried_object()->taxonomy, get_post_type_object( $post->post_type ));
else:
	$editLink = get_edit_post_link();
endif; ?>
	<a class="post-edit-link" style="position:fixed;bottom:0px;left:0;background-color:#b43738;color:#fff;font-weight:bold;padding:5px;display:block;z-index:100000000;font-size: 13px;text-align: center;"
 href="<?= $editLink; ?>">עריכה<br><i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px;"></i> <?php echo get_num_queries();?> </a>
<?php endif; ?>

<?php wp_footer(); ?>
<?php the_field('site_footer_code','option');?>
</body>
</html>