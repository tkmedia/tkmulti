<?php 
$share_block_width = get_sub_field('flex_share_block_width');
$share_mobile_cols = get_sub_field('flex_share_mobile');
$share_hide_mobile = get_sub_field('flex_share_hide_mobile');
$share_order = get_sub_field('flex_share_order');
$share_break = get_sub_field('flex_share_break');
$share_block_align = get_sub_field('flex_share_block_align');
$share_animation = get_sub_field('flex_share_animation');

	$share_title_show = get_sub_field( 'flex_share_title_show' );
	$share_title_position = get_sub_field( 'flex_share_title_position' );
	$share_title = get_sub_field( 'flex_share_title' );
	$share_subtitle = get_sub_field( 'flex_share_subtitle' );
	$share_type = get_sub_field( 'flex_share_type' );
	$share_select = get_sub_field( 'flex_share_select' );
	$share_contact = get_sub_field( 'flex_share_contact' );
	$share_layout = get_sub_field( 'flex_share_layout' );
	
	$whatsapp_show = get_sub_field( 'flex_share_whatsapp_show' );
	$email_show = get_sub_field( 'flex_share_email_show' );
	$cellphone_show = get_sub_field( 'flex_share_cellphone_show' );
	$messanger_show = get_sub_field( 'flex_share_messanger_show' );
	$phone_show = get_sub_field( 'flex_share_phone_show' );
	$facebook_show = get_sub_field( 'flex_share_facebook_show' );

	$s_twitter = get_sub_field( 'flex_s_twitter_show' );
	$s_facebook = get_sub_field( 'flex_s_facebook_show' );
	$s_whatsapp = get_sub_field( 'flex_s_whatsapp_show' );
	$s_email = get_sub_field( 'flex_s_email_show' );
	$s_pinterest = get_sub_field( 'flex_s_pinterest_show' );
	$s_messenger = get_sub_field( 'flex_s_messenger_show' );
						
	$site_phone = get_field('header_phone','option');
	$phone_title = get_field('site_phone_title','option');
	$whatsapp_num = get_field('site_whatsapp_num','option');
	$whatsapp_text = get_field('site_whatsapp_text','option');
	$main_email = get_field('site_main_email','option');
	$email_text = get_field('site_main_email_text','option');
	$main_cellphone = get_field('site_main_cellphone','option');
	$cellphone_text = get_field('site_main_cellphone_text','option');
	$site_messanger = get_field('site_messanger','option');
	$messanger_text = get_field('site_messanger_text','option');
	$site_facebook = get_field('site_facebook','option');
	$facebook_text = get_field('site_facebook_text','option');							

	$twitter_share = get_field('site_twitter_share','option');
	$facebook_share = get_field('site_facebook_share','option');
	$whatsapp_share = get_field('site_whatsapp_share','option');
	$email_share = get_field('site_email_share','option');
					
if ( $share_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $share_mobile_cols;?> <?php echo $share_block_width;?> <?php if( $share_break ){ ?><?php echo $share_block_align; ?><?php } ?>" <?php if( $share_order ){ ?>style="order:<?php echo $share_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $share_animation;?>">
		<div class="share_contact flexible_page_element" itemprop="text">
			
			<div class="share_contact_wrap content_wrap">

				<div class="share_contact_row row-flex middle-xs <?php echo $share_layout; ?> <?php if( !$share_title && !$share_subtitle ) { ?>center-xs<?php } ?>">
					
					<?php if( $share_title_show ) { ?>
					<div class="share_contact_title_col col-xs-12 title_<?php echo $share_title_position; ?>">
						<div class="share_contact_title_inner">
							<?php if( $share_title ) { ?>
							<div class="share_contact_title"><?php echo $share_title; ?></div>
							<?php } ?>
							<?php if( $share_subtitle ) { ?>
							<div class="share_contact_subtitle"><?php echo $share_subtitle; ?></div>
							<?php } ?>
						</div>
					</div>
					
					<div class="share_contact_type col-xs-12 title_<?php echo $share_title_position; ?>">
					<?php } else { ?>
					<div class="share_contact_type col-xs-12">
					<?php } ?>	
						<?php if( $share_type == 'contact_icons' ): ?>
						<div class="share_contact_c_row">
							<?php if( $whatsapp_num && $whatsapp_show ) { ?>
							<div class="contact_item about_contact_item_whatsapp">
								<a class="Aligner" href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp_num; ?>" target="_blank">
									<span class="contact_item_icon">
										<i class="fab fa-whatsapp"></i>									
									</span>
									<span class="contact_item_text whatsapp_pre">
										<div class="whatsapp_pre_wrap"><?php echo $whatsapp_text; ?></div>
									</span>
								</a>
							</div>
							<?php } ?>	
							<?php if( $main_email && $email_show ) { ?>
							<div class="contact_item contact_item_email">
								<a href="#share_contact_popup" class="contact_form_popup_link share_contact_popup Aligner" data-effect="mfp-zoom-in">
								<a data-fancybox data-src="#popop-form-<?php echo $row;?>-<?php echo $count;?>" href="javascript:;">
									<span class="contact_item_icon">
										<i class="fas fa-envelope"></i>
									</span>
									<span class="contact_item_text email_pre">
										<div class="email_pre_wrap"><?php echo $email_text; ?></div>
									</span>
								</a>
							</div>
							<?php 
							$popup_contact_title = get_option( 'options_default_flex_form_title' );
							$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
							?>
							<div style="display: none;max-width: 700px;" id="popop-form-<?php echo $row;?>-<?php echo $count;?>" class="button-popop-form">
								<div class="button-popop-form-wrap">
									<div class="button-popop-form-row">
										<div class="button-popop-form-col form-image col-xs-12">
											<?php if( $popup_contact_title ) { ?>
											<div class="contact-title">
												<div class="popup_contact_title"><?php echo $popup_contact_title; ?></div>
											</div>
											<?php } ?>
											<?php if( $popup_contact_subtext ) { ?>
											<div class="contact-title">
												<div class="popup_contact_subtext"><?php echo $popup_contact_subtext; ?></div>
											</div>
											<?php } ?>
											<div class="contact-form-page">
												<div class="full_form_id">
													<div class="full_form_id_wrap">
														<?php echo do_shortcode( '[contact-form-7 id="'.$button_form_link.'" ]' ); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if( $site_phone && $phone_show ) { ?>
							<div class="contact_item contact_item_phone">
								<a class="Aligner" href="tel:<?php echo $header_phone; ?>">
									<span class="contact_item_icon">
										<i class="fas fa-phone"></i>									
									</span>
									<span class="contact_item_text phone_pre">
										<div class="phone_pre_wrap"><?php echo $phone_title; ?></div>
									</span>
								</a>
							</div>
							<?php } ?>	
							<?php if( $main_cellphone && $cellphone_show ) { ?>
							<div class="contact_item contact_item_cellphone">
								<a class="Aligner" href="tel:<?php echo $main_cellphone; ?>">
									<span class="contact_item_icon">
										<i class="fas fa-mobile-android-alt"></i>									
									</span>
									<span class="contact_item_text cellphone_pre">
										<div class="cellphone_pre_wrap"><?php echo $cellphone_text; ?></div>
									</span>
								</a>
							</div>
							<?php } ?>	
							<?php if( $site_messanger && $messanger_show ) { ?>
							<div class="contact_item contact_item_messanger">
								<a class="Aligner" href="<?php echo $site_messanger; ?>" target="_blank">
									<span class="contact_item_icon">
										<i class="fab fa-facebook-messenger"></i>									
									</span>
									<span class="contact_item_text messanger_pre">
										<div class="messanger_pre_wrap"><?php echo $messanger_text; ?></div>
									</span>
								</a>
							</div>
							<?php } ?>	
							<?php if( $site_facebook && $facebook_show ) { ?>
							<div class="contact_item contact_item_facebook" target="_blank">
								<a class="Aligner" href="<?php echo $site_facebook; ?>">
									<span class="contact_item_icon">
										<i class="fab fa-facebook"></i>								
									</span>
									<span class="contact_item_text facebook_pre">
										<div class="facebook_pre_wrap"><?php echo $facebook_text; ?></div>
									</span>
								</a>
							</div>
							<?php } ?>	
	
						</div>								
						<?php endif; ?>
						
						<?php if( $share_type == 'share_icons' ): ?>
							<div class="share_contact_s_row">
								<div class="share_contact_s_block"></div>
							</div>
							<script>
							jQuery(function($) {								
								// jsSocials
							    $(".section-<?php echo $row;?>-<?php echo $count; ?> .share_contact_s_block").jsSocials({
							        showLabel: true,
							        showCount: false,
							        shareIn: "popup",
							        shares: [
							        <?php if($s_whatsapp) { ?>{ share: "whatsapp", label: "<?php echo $whatsapp_share;?>" },<?php } ?>
							        <?php if($s_email) { ?>{ share: "email", label: "<?php echo $email_share;?>" },<?php } ?>
							        <?php if($s_facebook) { ?>{ share: "facebook", label: "<?php echo $facebook_share;?>" },<?php } ?>
								    <?php if($s_twitter) { ?>{ share: "twitter", label: "<?php echo $facebook_share;?>" },<?php } ?>
								    <?php if($s_pinterest) { ?>{ share: "pinterest", label: "<?php echo $pinterest_share;?>" },<?php } ?>
								    <?php if($s_messenger) { ?>{ share: "messenger", label: "<?php echo $messenger_share;?>" },<?php } ?>
							        ]
							    });
							
								$(".jssocials-share-label").each(function() {
								    var html = $(this).html().split(" ");
								    var newhtml = [];
								    for(var i=0; i< html.length; i++) {
								        if(i>0 && (i%2) == 0)
								            newhtml.push("<br />");
								        newhtml.push(html[i]);
								    }
								    $(this).html(newhtml.join(" "));
								});
							});
							</script>									
						<?php endif; ?>	
						
					</div>
				</div>
			</div>
		
		</div>
	</section>
</div>
<?php if( $share_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
