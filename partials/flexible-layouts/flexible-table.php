<?php 
$table_block_width = get_sub_field('flex_table_block_width');
$table_mobile_cols = get_sub_field('flex_table_mobile');
$table_hide_mobile = get_sub_field('flex_table_hide_mobile');
$table_order = get_sub_field('flex_table_order');
$table_break = get_sub_field('flex_table_break');
$table_block_align = get_sub_field('flex_table_block_align');
$table_animation = get_sub_field('flex_table_animation');

$table_title = get_sub_field('flex_table_title');
$table_subtitle = get_sub_field('flex_table_subtitle');
$table_title_size = get_sub_field('flex_table_title_size');
$table_subtitle_size = get_sub_field('flex_table_subtitle_size');
$table_title_a = get_sub_field('flex_table_title_a');
$table_title_color = get_sub_field('flex_table_title_color');
$table_subtitle_color = get_sub_field('flex_table_subtitle_color');

$flex_table = get_sub_field('flex_table_block');

if ( $table_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $table_mobile_cols;?> <?php echo $table_block_width;?> <?php if( $table_break ){ ?><?php echo $table_block_align; ?><?php } ?>" <?php if( $table_order ){ ?>style="order:<?php echo $table_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $table_animation;?>">

		<div class="flex_table flexible_page_element" itemprop="text">
			<div class="table_wrap content_wrap">
				<?php if( $table_title || $table_subtitle ) { ?>
				<div class="content_one_column_title_wrap">
					<?php if( $table_title ) { ?>
					<h2 class="section_title section_flex_title title_<?php echo $table_title_a; ?>" style="text-align:<?php echo $table_title_a; ?> !important;color:<?php echo $table_title_color; ?>;font-size:<?php echo $table_title_size; ?>px;"><?php echo $table_title; ?></h2>
					<?php } ?>
					<?php if( $table_subtitle ) { ?>
					<div class="section_subtitle title_<?php echo $table_title_a; ?>" itemprop="headline" style="text-align:<?php echo $table_title_a; ?> !important;color:<?php echo $table_subtitle_color; ?>;font-size:<?php echo $table_subtitle_size; ?>px;"><?php echo $table_subtitle; ?></div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( $flex_table ) { ?>
				<div class="section_content_wrap">
					<div class="table_container">

						<div class="table-list-row">
						<?php 
						$i = 1;
					
						    echo '<table border="0">';

						        if ( ! empty( $flex_table['caption'] ) ) {
						            echo '<caption>' . $$flex_table['caption'] . '</caption>';
						        }

						        if ( $flex_table['header'] ) {
						            echo '<thead>';
						                echo '<tr>';
						                    foreach ( $flex_table['header'] as $th ) {
						                        echo '<th>';
						                            echo $th['c'];
						                        echo '</th>';
						                    }
						                echo '</tr>';
						            echo '</thead>';
						        }
						
						        echo '<tbody>';
						            foreach ( $flex_table['body'] as $tr ) {
						                echo '<tr>';
						                    foreach ( $tr as $td ) {
						                        echo '<td>';
						                            echo $td['c'];
						                        echo '</td>';
						                    }
						                echo '</tr>';
						            }
						        echo '</tbody>';
						
						    echo '</table>';
					         
					         ?>
							<style>
							@media 
							only screen and (max-width: 760px),
							(min-device-width: 768px) and (max-device-width: 1024px)  {
								<?php foreach ( $flex_table['header'] as $th ) { ?>  td:nth-of-type(<?php echo $i++; ?>):before { content: "<?php echo $th['c']; ?>"; }  <?php } ?>
							}			
							</style>				        
						</div>

					</div>
				</div>
				<?php } ?>
			</div>
		</div>
				
	</section>
</div>
<?php if( $table_break ){ ?><div class="break"></div><?php } ?>

<?php } ?>	