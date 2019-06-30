<?php 
$video_block_width = get_sub_field('flex_video_block_width');
$video_break = get_sub_field('flex_video_break');
$video_block_align = get_sub_field('flex_video_block_align');
$video_order = get_sub_field('flex_video_order');
$video_mobile = get_sub_field('flex_video_mobile');
$video_hide_mobile = get_sub_field('flex_video_hide_mobile');
$video_animation = get_sub_field('flex_video_animation');

$video_open_style = get_sub_field('flex_video_open_style');
$video_image_type = get_sub_field('flex_video_image_type');
$video_image = get_sub_field('flex_video_image');
$video_link = get_sub_field('flex_video_link');

//second false skip ACF pre-processcing
$youtube_vid_url = get_sub_field('flex_video_link', false, false);
//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
$oembed = _wp_oembed_get_object();
//get provider
$provider = $oembed->get_provider($youtube_vid_url);
//fetch oembed data as an object
$oembed_data = $oembed->fetch( $provider, $youtube_vid_url );
$thumbnail = $oembed_data->thumbnail_url;
$iframe = $oembed_data->html;
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
$youtube_id = $match[1];									

if ( $video_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $video_mobile;?> <?php echo $video_block_width;?> <?php if( $video_break ){ ?><?php echo $video_block_align; ?><?php } ?>" <?php if( $video_order ){ ?>style="order:<?php echo $video_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>"<?php if( $video_animation ){ ?> data-aos="<?php echo $video_animation;?>"<?php } ?>>
		
		<div class="content_youtube_vid flexible_page_element" itemprop="text">
			<div class="content_youtube_vid_wrap">
				<?php if( $video_open_style == 'on-page' ): ?>
					<div class="content_youtube_vid_container">
						<?php
						//$iframe = get_field('oembed');
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						$params = array(
							'controls' => 1,
							'hd' => 1,
							//'id' => 'classs',
							'hd' => 1,
							'modestbranding' => 1,
							'autohide' => 1,
							//'autoplay' => 0,
							'loop' => 1,
							'volume' => 0,
							'showinfo' => 0,
							'enablejsapi' => 1,
							'rel' => 0
						);
						
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						// add extra attributes to iframe html
						$attributes = 'frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
						// echo $iframe
						echo $iframe; ?>
					</div>
				<?php endif; ?>
		
				<?php if( $video_open_style == 'in-popup' ): ?>
				<div class="media_item_video">
					<a data-fancybox href="<?php echo $youtube_vid_url; ?>" class="">	
						<div class="video_grid_item_bg_1 video_item_bg img_youtube">
				            <?php if( $video_image_type == 'from-vid' ): ?>
				            <img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg">
				            <?php endif; ?>
				            <?php if( $video_image_type == 'custom-img' ): ?>
				            <?php echo wp_get_attachment_image( $video_image, 'full' ); ?>
				            <?php endif; ?>						            
							<div class="video_overlay"><i class="fab fa-youtube"></i></div>
						</div>
					</a>
				</div>	
				<?php endif; ?>
							
			</div>
		</div>
	</section>
</div>
<?php if( $video_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>