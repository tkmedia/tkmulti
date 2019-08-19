<?php
$link_grid_block_width = get_sub_field('flex_manual_link_grid_block_width');
$link_grid_order = get_sub_field('flex_manual_link_grid_order');
$link_grid_mobile = get_sub_field('flex_manual_link_grid_mobile');
$link_grid_hide_mobile = get_sub_field('flex_manual_link_grid_hide_mobile');
$link_grid_break = get_sub_field('flex_manual_link_grid_break');
$link_grid_block_align = get_sub_field('flex_manual_link_grid_block_align');
$link_grid_style = get_sub_field('flex_manual_link_grid_style');
$link_grid_slider = get_sub_field('flex_manual_link_grid_slider');

$link_grid_type = get_sub_field( 'flex_manual_link_grid_type' );
$link_grid_grid = get_sub_field( 'flex_manual_link_grid_grid' );
$link_grid_bw = get_sub_field('flex_manual_link_grid_bw');
$text_position = get_sub_field('flex_manual_link_grid_text_position');
$link_grid_count = get_sub_field('flex_manual_link_grid_count');
$link_grid_animation = get_sub_field('flex_manual_link_grid_animation');

$manual_link_title = get_sub_field('flex_manual_link_title');
$manual_link_title_size = get_sub_field('flex_manual_link_title_size');
$manual_link_title_color = get_sub_field('flex_manual_link_title_color');
$manual_link_title_align = get_sub_field('flex_manual_link_title_align');
$manual_link_subtitle = get_sub_field('flex_manual_link_subtitle');
$manual_link_subtitle_size = get_sub_field('flex_manual_link_subtitle_size');
$manual_link_subtitle_color = get_sub_field('flex_manual_link_subtitle_color');

	if ( $link_grid_count == 1 ) : $m_xs_cols = "12"; $m_sm_cols = "12"; $m_md_cols = "12"; $m_lg_cols = "12";
	elseif ( $link_grid_count == 2 ) : $m_xs_cols = "12"; $m_sm_cols = "6"; $m_md_cols = "6"; $m_lg_cols = "6";
	elseif ( $link_grid_count == 3 ) : $m_xs_cols = "6"; $m_sm_cols = "4"; $m_md_cols = "4"; $m_lg_cols = "4";
	elseif ( $link_grid_count == 4 ) : $m_xs_cols = "6"; $m_sm_cols = "4"; $m_md_cols = "3"; $m_lg_cols = "3";
	elseif ( $link_grid_count == 5 ) : $m_xs_cols = "6"; $m_sm_cols = "4"; $m_md_cols = "20"; $m_lg_cols = "20";
	elseif ( $link_grid_count == 6 ) : $m_xs_cols = "6"; $m_sm_cols = "3"; $m_md_cols = "2"; $m_lg_cols = "2";
	elseif ( $link_grid_count == 7 ) : $m_xs_cols = "6"; $m_sm_cols = "3"; $m_md_cols = "seven"; $m_lg_cols = "seven";
	elseif ( $link_grid_count == 8 ) : $m_xs_cols = "6"; $m_sm_cols = "3"; $m_md_cols = "20"; $m_lg_cols = "eight";
	endif;

if ( $link_grid_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $link_grid_mobile;?> <?php echo $link_grid_block_width;?> <?php if( $link_grid_break ){ ?><?php echo $link_grid_block_align; ?><?php } ?>" <?php if( $link_grid_order ){ ?>style="order:<?php echo $link_grid_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $link_grid_animation;?>">

		<div class="masonary_grid_link <?php echo $link_grid_type; ?> grid-<?php echo $link_grid_style; ?> <?php echo $text_position; ?> flexible_page_element" itemprop="text">
			
			<?php if( $manual_link_title || $manual_link_subtitle ) { ?>
			<div class="masonary_grid_link_title_wrap">
				<?php if( $manual_link_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $manual_link_title_align; ?>" style="text-align:<?php echo $manual_link_title_align; ?> !important;color:<?php echo $manual_link_subtitle_color; ?>;font-size:<?php echo $manual_link_title_size; ?>px;"><?php echo $manual_link_title; ?></h2>
				<?php } ?>
				<?php if( $manual_link_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $manual_link_title_align; ?>" itemprop="headline" style="text-align:<?php echo $$manual_link_title_align; ?> !important;color:<?php echo $one_subtitle_color; ?>;font-size:<?php echo $manual_link_subtitle_size; ?>px;"><?php echo $manual_link_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<div class="masonary_grid_link_wrap masonary_grid-<?php echo $count;?>">

				<?php if( $link_grid_grid ) { ?>
				<div class="masonary_grid <?php if( $link_grid_bw ) { ?>masonary_bw<?php } ?><?php if( $link_grid_slider ) { ?> swiper-container<?php } ?>">

					<?php if( $link_grid_type == 'box-layout' ) { ?>
					<div class="layout <?php if( $link_grid_slider ) { ?>swiper-wrapper<?php } else { ?>row-flex center-xs<?php } ?>">
					<?php while ( have_rows('flex_manual_link_grid_grid') ) : the_row();
						$flex_masonary_img = get_sub_field('flex_masonary_img');
						$flex_masonary_title = get_sub_field('flex_masonary_title');
						$flex_masonary_subtitle = get_sub_field('flex_masonary_subtitle');
						$flex_masonary_link = get_sub_field('flex_masonary_link');
						$flex_masonary_title_color = get_sub_field('flex_masonary_title_color');
					?>
					    <div class="grid-item <?php if( $link_grid_slider ) { ?>swiper-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?> col-lg-<?php echo $m_lg_cols; ?><?php } ?>">
							<a href="<?php echo $flex_masonary_link; ?>" class="img_info_link">
							<div class="grid-item-inner">
								<div class="grid-item-inner-img-bg">
									<div class="grid-item-inner-img">
									<?php echo wp_get_attachment_image( $flex_masonary_img, 'product-500c' ); ?>
									</div>
								</div>
								<?php if( $flex_masonary_subtitle || $flex_masonary_title ) { ?>
								<div class="flex_masonary_content <?php echo $text_position; ?>" style="color:<?php echo $flex_masonary_title_color; ?>;">
									<div class="flex_masonary_content_wrap">
										<div class="flex_masonary_title">
											<?php echo $flex_masonary_title; ?>
										</div>
										<?php if( $flex_masonary_subtitle ) { ?>
										<div class="flex_masonary_subtitle">
											<?php echo $flex_masonary_subtitle; ?>
										</div>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							</div>
							</a>
					    </div>
				    <?php endwhile; ?>
					</div>

					<?php } elseif( $link_grid_type == 'vid-layout' ) { ?>
					<div class="layout <?php if( $link_grid_slider ) { ?>swiper-wrapper<?php } else { ?>row-flex<?php } ?>">
					<?php while ( have_rows('flex_manual_link_grid_grid') ) : the_row();
						$flex_masonary_img = get_sub_field('flex_masonary_img');
						$flex_masonary_vid_link = get_sub_field('flex_masonary_vid_link');
						$flex_masonary_vid_title = get_sub_field('flex_masonary_vid_title');
					?>
					    <div class="grid-item <?php if( $link_grid_slider ) { ?>swiper-slide<?php } else { ?>col-xs-<?php echo $m_xs_cols; ?> col-sm-<?php echo $m_sm_cols; ?> col-md-<?php echo $m_md_cols; ?><?php } ?>">
							<a data-fancybox href="<?php echo $flex_masonary_vid_link; ?>">
								<?php if( $flex_masonary_vid_title ) { ?>
								<div class="flex_masonary_vid_title"><?php echo $flex_masonary_vid_title; ?></div>
								<?php } ?>
							<div class="grid-item-inner">
								<?php echo wp_get_attachment_image( $flex_masonary_img, 'gallery-800' ); ?>
								<div class="flex_masonary_content img_cen_cen">
									<div class="flex_masonary_content_wrap">
										<span class="video_item_icon"><i class="fas fa-play"></i></span>
									</div>
								</div>
							</div>
							</a>
					    </div>
				    <?php endwhile; ?>
					</div>

				    <?php } else { ?>

					<div class="layout">
					<?php while ( have_rows('flex_manual_link_grid_grid') ) : the_row();
						$flex_masonary_img = get_sub_field('flex_masonary_img');
						$flex_masonary_title = get_sub_field('flex_masonary_title');
						$flex_masonary_subtitle = get_sub_field('flex_masonary_subtitle');
						$flex_masonary_link = get_sub_field('flex_masonary_link');
						$flex_masonary_title_color = get_sub_field('flex_masonary_title_color');
					?>
						<div class="grid-item">
							<a href="<?php echo $flex_masonary_link; ?>" class="img_info_link">
							<div class="grid-item-inner">
								<?php echo wp_get_attachment_image( $flex_masonary_img, 'full' ); ?>
								<?php if( $flex_masonary_subtitle || $flex_masonary_title ) { ?>
								<div class="flex_masonary_content <?php echo $text_position; ?>" style="color:<?php echo $flex_masonary_title_color; ?>;">
									<div class="flex_masonary_content_wrap">
										<div class="flex_masonary_title">
											<?php echo $flex_masonary_title; ?>
										</div>
										<?php if( $flex_masonary_subtitle ) { ?>
										<div class="flex_masonary_subtitle">
											<?php echo $flex_masonary_subtitle; ?>
										</div>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							</div>
							</a>
						</div>
				    <?php endwhile; ?>
					</div>

					<?php } ?>
					
					<?php if( $link_grid_slider ) { ?>
				    <!-- Add Arrows -->
				    <div class="swiper-pagination"></div>
				    <div class="swiper-button-next"></div>
				    <div class="swiper-button-prev"></div>
					<?php } ?>

				</div>
				<?php } ?>

			</div>
		</div>
		<?php if( $link_grid_type == 'grid-layout' || $link_grid_type == 'flex-layout' || $link_grid_slider ): ?>
		<script>
		jQuery(function($) {
			<?php if( $link_grid_type == 'grid-layout' ): ?>
			$('.grid-layout .grid-item:nth-child(3)').addClass('span-3');
			$('.grid-layout .grid-item:nth-child(5)').addClass('span-2');
			$('.grid-layout .grid-item:nth-child(10)').addClass('span-2');
			$('.grid-layout .grid-item:nth-child(13)').addClass('span-2');
			$('.grid-layout .grid-item:nth-child(17)').addClass('span-3');
			$('.grid-layout .grid-item:nth-child(21)').addClass('span-2');
			$('.grid-layout .grid-item:nth-child(26)').addClass('span-3');
			$('.grid-layout .grid-item:nth-child(40)').addClass('span-3');
			$('.grid-layout .grid-item:nth-child(45)').addClass('span-3');
			<?php endif; ?>
			<?php if( $link_grid_type == 'flex-layout' ): ?>
			$('.flex-layout .layout').addClass('row-flex');

			var elems = $(".layout > .grid-item");
			var wrapper = $('<div class="col_layout col-xs-12 col-sm-6"><div class="row-flex">');
			var pArrLen = elems.length;
			for (var i = 0;i < pArrLen;i+=2){
			    elems.filter(':eq('+i+'),:eq('+(i+1)+')').wrapAll(wrapper);
			};
			$('.flex-layout .col_layout:nth-child(4n+1)').addClass('row-a');
			$('.flex-layout .col_layout:nth-child(4n+2)').addClass('row-a');
			$('.flex-layout .col_layout:nth-child(4n+3)').addClass('row-b');
			$('.flex-layout .col_layout:nth-child(4n+4)').addClass('row-b');

			$('.flex-layout .grid-item').addClass('col-xs-12');
			//$('.flex-layout .col_layout:nth-child(odd) .grid-item').addClass('col-sm-6');
			<?php endif; ?>
			
			<?php if( $link_grid_slider ) { ?>
			
		    let options<?php echo $row;?><?php echo $count;?> = {};
		    
		    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide").length > 1 ) {
		        options<?php echo $row;?><?php echo $count;?> = {
		            //direction: 'horizontal',
		            loop: true,
		            slidesPerView : <?php echo $link_grid_count;?>,
		            autoplayDisableOnInteraction: false,
					pagination: {
						el: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination',
						clickable: true,
					},
					navigation: {
						nextEl: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next',
						prevEl: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev',
					},
		            paginationClickable: true,
		            fadeEffect: {
			            crossFade: true
		            },
					speed: 1000,
					grabCursor: true,
					watchSlidesProgress: true,
					mousewheelControl: true,
					keyboardControl: true,
					//effect: 'fade',  
					breakpoints: {
						768: {
							slidesPerView : 2,
				        },
						520: {
							slidesPerView : 1,
				        }
					}
					        
		        }
		        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
		        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();
		    } else {
		        options<?php echo $row;?><?php echo $count;?> = {
		            loop: false,
		            slidesPerView : <?php echo $link_grid_count;?>,
		            autoplay: false,
		            watchOverflow: true,
		            navigation: false,
		        }
		    }
		    var topSlider<?php echo $row;?><?php echo $count;?> = new Swiper('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-container ', options<?php echo $row;?><?php echo $count;?>);	
		    
		    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide:not(.swiper-slide-duplicate)").length > <?php echo $link_grid_count;?> ) {
		        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
		        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();
		        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination').show();		    
		    }
		    
		    if ($(window).width() < 991) {
			    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide:not(.swiper-slide-duplicate)").length > 1 ) {
					$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination').show();
			    }
		    }							
								    
		    <?php } ?>		
			
			
		});
		</script>
		<?php endif; ?>

	</section>
</div>
<?php if( $link_grid_break ){ ?><div class="break"></div><?php } ?>

<?php } ?>
