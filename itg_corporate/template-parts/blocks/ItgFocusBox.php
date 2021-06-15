
<?php 
$focus_box_columns = get_sub_field("heading_columns");
$focus_box_background_color = get_sub_field("background_color");


?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgFocusBox  <?php echo $enviroment; ?>">
  <div class="container itg--background-color-<?php echo $focus_box_background_color; ?> " >
    <div class="columns is-centered is-mobile">
      <div class="column <?php echo $focus_box_columns ?> ">
        <div class="columns itgBlock__ItgFocusBox__block--list swiper-container">          
          <div class="swiper-wrapper">
            <?php
              if( have_rows('focus_box_blocks') ):              
                $block_count = 0;
                while( have_rows('focus_box_blocks') ) : the_row();
                  $block_count++;
                endwhile;
                //$column

                while( have_rows('focus_box_blocks') ) : the_row();
                  $focus_box_block_background_color = $focus_box_background_color;
                  $is_centered = "is-centered";
                  $has_shadow = "has-shadow";
                  $box_padding = "itg-px-24";
                  
                  while( have_rows('focus_box_text_block_group') ) : the_row();
                    $bg_color = get_sub_field('text_box_background_color_background_color');
                    if(empty($bg_color) || $bg_color == $focus_box_block_background_color){ //if background color is empty equal to block background
                      $is_centered = "";
                      $has_shadow = "";
                      $box_padding = "";
                    } else {
                      $focus_box_block_background_color = $bg_color;
                    }
                  endwhile;
                  //layout_builder_0_layout_5_focus_box_blocks_0_focus_box_
            ?>
            <div class="column itg-py-48 is-inline-flex swiper-slide itgBlock__ItgFocusBox__block--slide itgBlock__ItgFocusBox__block--count--<?php echo $block_count; ?>">
              <div class="itgBlock__ItgFocusBox__box <?php echo $box_padding; ?> itg-py-24  itg--background-color-<?php echo $focus_box_block_background_color; ?> <?php echo $has_shadow; ?>">

                <?php
                  while( have_rows('focus_box_icon_group') ) : the_row(); //ICON START
                    $focus_box_icon_color = get_sub_field('focus_box_icon_color');
                    $focus_box_icon = get_sub_field('focus_box_icon');
                    $focus_box_icon_url = wp_get_attachment_url($focus_box_icon);

                ?>
                <?php if ($focus_box_icon): ?>
                  <div class="itgBlock__ItgFocusBox__box--icon image itg-pb-24 itg-pt-24">
                    <img src="<?php echo $focus_box_icon_url; ?>" alt="Focus Box icon">
                  </div>
                <?php endif; ?>
                <?php                  
                  endwhile; //ICON END
                ?>

                <?php
                  while( have_rows('focus_box_text_block_group') ) : the_row(); //TEXT BOX START                  
                  $focus_box_title = get_sub_field('text_box_title');
                  $focus_box_title_color = get_sub_field('text_box_title_color_text_color');
                  $focus_box_title_style = get_sub_field('text_box_title_style_heading_style');

                  
                  $focus_box_text = get_sub_field("text_box_paragraph");
                  $focus_box_text_style = get_sub_field("text_box_paragraph_style_paragraph_style");
                  $focus_box_text_color = get_sub_field("text_box_paragraph_color_text_color");
                  $focus_box_cta_link = get_sub_field("cta_link");
                ?>
                  <div class="itgBlock__ItgFocusBox__box--text-box itg-mb-24 itg-mt-24">
                    <?php if ($focus_box_title): ?>
                      <div class="<?= $focus_box_title_style ?> itg--color-<?php echo $focus_box_title_color; ?>">
                        <<?= $focus_box_title_style ?>>
                          <?= $focus_box_title; ?> 
                        </<?= $focus_box_title_style ?>></div>
                    <?php endif; ?>
                    <?php if($focus_box_text): ?>
                      <div class="<?= $focus_box_text_style ?> itg--color-<?php echo $focus_box_text_color; ?>">
                        <?= $focus_box_text; ?>
                      </div>
                    <?php endif; ?>
                    
                    <?php if($focus_box_text): ?>
                      <div class="<?= $focus_box_text_style ?> itg--color-<?php echo $focus_box_text_color; ?>">
                        <?= $focus_box_text; ?>
                      </div>
                    <?php endif; ?>
                    <?php
                      if($focus_box_cta_link){  ?>
                      </div>
                      <div class="itgBlock__ItgFocusBox__box--cta-box container itg-mt-48">
                        <?php require 'atoms/ItgAtomCta.php'; ?>
                    <?php } ?>
                  </div>
                <?php                  
                  endwhile; //TEXT BOX END
                ?>
              </div>
            </div>
          <?php
              endwhile;
            endif; 
          ?>
          </div>          
          <div class="itgBlock__ItgFocusBox--sliderPagination swiper-pagination"></div>
        </div>        
      </div>
    </div>
  </div>
</div>