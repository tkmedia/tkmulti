<?php 
$qa_accordion_block_width = get_sub_field('flex_qa_accordion_block_width');
$qa_accordion_order = get_sub_field('flex_qa_accordion_order');
$qa_accordion_mobile = get_sub_field('flex_qa_accordion_mobile');
$qa_accordion_hide_mobile = get_sub_field('flex_qa_accordion_hide_mobile');
$qa_accordion_break = get_sub_field('flex_qa_accordion_break');
$qa_accordion_block_align = get_sub_field('flex_qa_accordion_block_align');

$qa_accordion_title = get_sub_field('flex_qa_accordion_title');
$page_qa_subtitle = get_sub_field('flex_page_qa_subtitle');
$qa_accordion_style = get_sub_field('flex_qa_accordion_style');
$page_qa_title_a = get_sub_field('flex_page_qa_title_a');
$qa_accordion_cols = get_sub_field('flex_qa_accordion_cols');
$qa_accordion_icon = get_sub_field('flex_qa_accordion_icon');
$qa_accordion = get_sub_field('flex_qa_accordion');
$qa_accordion_animation = get_sub_field('flex_qa_accordion_animation');

if ( $qa_accordion_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $qa_accordion_mobile;?> <?php echo $qa_accordion_block_width;?> <?php if( $qa_accordion_break ){ ?><?php echo $qa_accordion_block_align; ?><?php } ?>" <?php if( $qa_accordion_order ){ ?>style="order:<?php echo $qa_accordion_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $qa_accordion_animation;?>">

		<div class="content_page_qa flexible_page_element qa_icon_<?php echo $qa_accordion_icon; ?>" itemprop="text">
			<div class="page_qa_wrap style_arrow">
				<?php if( $qa_accordion_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $page_qa_title_a; ?>" style="text-align:<?php echo $page_qa_title_a; ?> !important;"><?php echo $qa_accordion_title; ?></h2>
				<?php } ?>				
				<?php if( $page_qa_subtitle ) { ?>
				<div class="page_qa_subtitle title_<?php echo $page_qa_title_a; ?>" style="text-align:<?php echo $page_qa_title_a; ?> !important;"><p><?php echo $page_qa_subtitle; ?></p></div>
				<?php } ?>				

				<?php if( $qa_accordion_style == 'tabs' ) { ?>		

					<!-- Begin .qa_tabs -->
					<div class="VerticalTab fc_VerticalTab VerticalTab_1 tabs_ver_1 row-flex">
					<?php if( have_rows('flex_qa_accordion') ): ?>
						<ul class="resp-tabs-list hor_1 col-sm-5">
						<?php $i = 1; while( have_rows('flex_qa_accordion') ): the_row(); 
							// vars
							$qa_tabs_q = get_sub_field('flex_qa_accordion_question');
							?>								
							<li class="tabs-<?php echo $i; ?>">
								<span class="tabs-text">
								<div class="accordion_question"><?php echo $qa_tabs_q; ?></div>
								</span>
							</li>
						<?php $i++;endwhile; ?>
						</ul>
						<?php endif; ?>
						<?php if( have_rows('flex_qa_accordion') ): ?>	
						<div class="resp-tabs-container hor_1 col-sm-7">
						<?php $i = 1; while( have_rows('flex_qa_accordion') ): the_row();
							// vars
							$qa_tabs_a = get_sub_field('flex_qa_accordion_answer');
							?>								
							<div class="tabcontent fc-tab-<?php echo $i; ?>">
								<?php if( $qa_accordion_icon == 'text_qa' ) { ?>
								<div class="title_contanier"><?php _e('Answer', 'tkmulti'); ?></div>
								<?php } ?>
								<div class="tabcontent_contanier"><?php echo $qa_tabs_a; ?></div>
							</div>
							<?php $i++;endwhile; ?>								
						</div>
						<?php endif; ?>
					</div>
					<!-- End .qa_tabs -->
				<?php } ?>
				<?php
				if( $qa_accordion_style == 'accordion' ) { ?>				
					<?php if( have_rows('flex_qa_accordion') ): ?>
						<div class="page_qa_row page_qa_row_accordion">
							<div class="page_qa_col row-flex">
								<?php $i = 1; while (have_rows('flex_qa_accordion')) : the_row();
									$accordion_question = get_sub_field('flex_qa_accordion_question');
									$accordion_answer = get_sub_field('flex_qa_accordion_answer'); ?>
								<div class="page_qa_item <?php if( $qa_accordion_cols == 'page_qa_two_col' ) { ?>page_qa_two_item<?php } else {?>page_qa_one_item<?php } ?>">
									<div id="question-<?php echo $i; ?>" aria-controls="answer-<?php $i; ?>" role="tab" class="page_qa_item_question">
										<?php if( $qa_accordion_icon == 'text_qa' ) { ?>
										<div class="accordion_question_pre"><?php _e('Question', 'tkmulti'); ?></div>
										<?php } ?>
										<div class="accordion_question"><?php echo $accordion_question; ?></div>
									</div>
									<div id="answer-<?php $i; ?>" aria-labelledby="question-<?php $i; ?>" class="page_qa_item_answer">
										<div class="accordion_answer">
										<?php if( $qa_accordion_icon == 'text_qa' ) { ?>
										<div class="accordion_answer_pre"><?php _e('Answer', 'tkmulti'); ?></div>
										<?php } ?>
										<div class="accordion_answer_wrap"><?php echo $accordion_answer; ?></div>
										</div>
									</div>
								</div>
								<?php $i++; endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
					
				<?php } ?>					
			</div>

		</div>
	</section>
	
	<?php if( $qa_accordion_style == 'tabs' ) { ?>	
	<script>					
	jQuery(function($) {

	}); 				
	</script>								
	<?php } ?>
	
	<?php if( $qa_accordion_style == 'accordion' ) { ?>	
	<script>					
	jQuery(function($) {

		//* ## Page Accordion Q&A split 2 columns (Option #1)
	    $.fn.splitList = function() {
	        var that = this,
	            li = $('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_two_item', that),
	            len = li.length,
	            half = Math.round(len / 2);
	            //half = Math.floor(len / 2);
	        return that.each(function() {
	            li.slice(0, half).wrapAll('<div class=".section-<?php echo $row;?>-<?php echo $count;?> page_qa_subcol col-sx-12 col-sm-6"></div>');
	            li.slice(half, len).wrapAll('<div class=".section-<?php echo $row;?>-<?php echo $count;?> page_qa_subcol col-sx-12 col-sm-6"></div>');
	        });
	    };
	    $( ".section-<?php echo $row;?>-<?php echo $count;?> .page_qa_one_item" ).wrapAll( "<div class='page_qa_subcol' />");
	    
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col').splitList();
		
		//* ## Page Accordion Q&A - with split 2 columns .page_qa_subcol
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col > .page_qa_subcol > .page_qa_item').attr('tabindex', '0');
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col > .page_qa_subcol > .page_qa_item > .page_qa_item_answer').attr('aria-hidden', 'true');
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col > .page_qa_subcol > .page_qa_item > .page_qa_item_question').attr('aria-expanded', 'false');
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col > .page_qa_subcol > .page_qa_item > .page_qa_item_answer').attr('aria-expanded', 'false');
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col > .page_qa_subcol > .page_qa_item').click(function(){
			if($(this).children('.page_qa_item_answer').attr('aria-hidden') == 'true') {
				$(this).children('.page_qa_item_answer').attr('aria-hidden', 'false');
				$(this).children('.basic').attr('aria-expanded', 'true');
				$(this).children('.page_qa_item_answer').attr('aria-expanded', 'ture');
				$(this).children('.page_qa_item_question').addClass('q_open');
			} else {
				$(this).children('.page_qa_item_answer').attr('aria-hidden', 'true');
				$(this).children('.basic').attr('aria-expanded', 'false');
				$(this).children('.page_qa_item_answer').attr('aria-expanded', 'false');
				$(this).children('.page_qa_item_question').removeClass('q_open');
			}
			$(this).children('.page_qa_item_answer').slideToggle();
		});
		$('.section-<?php echo $row;?>-<?php echo $count;?> .page_qa_col > .page_qa_subcol > .page_qa_item').on("keydown", function(ev){ if (ev.which == 13) { $(this).click(); } });
		

	}); 				
	</script>								
	<?php } ?>
	
	
</div>	
<?php if( $qa_accordion_break ){ ?><div class="break"></div><?php } ?>		
<?php } ?>	