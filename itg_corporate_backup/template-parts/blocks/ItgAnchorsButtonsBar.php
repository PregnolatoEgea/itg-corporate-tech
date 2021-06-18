<?php 

$anchor_heading_columns = get_sub_field("heading_columns");
$anchors_buttons_items = get_sub_field("anchors_buttons_items");
$anchors_background_color = get_sub_field("anchors_buttons_background_color_background_color");
$anchors_buttons_back_top_label = get_sub_field("anchors_buttons_back_top_label");

$anchor_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/arrow_anchor.svg';
$go_up_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/arrow_go_up.svg';
$anchor_color = $anchors_background_color == 'light-blue' ? "#003478" : "white"





//print("<pre>".print_r($anchor_heading_columns,true)."</pre>");
//print("<pre>".print_r($anchors_background_color,true)."</pre>");
//print("<pre>".print_r($anchors_buttons_items,true)."</pre>");


?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgAnchorsButtonsBar <?php echo $enviroment; ?>" name="itg_block_<?php echo $block_id; ?>">
  <!-- Anchor Bar -->
  <div class="itg--background-color-<?php echo $anchors_background_color; ?>" >
    <div class="columns is-centered is-mobile is-vcentered">
      <div class="column <?= $anchor_heading_columns ?> itgBlock__ItgAnchorsButtonsBar__anchor-list">
        <div class="columns is-marginless is-mobile is-vcentered">
        <?php while ( have_rows("anchors_buttons_items") ) : the_row();  ?>
        <?php 
          $anchor_label = get_sub_field('anchors_buttons_items_label');
          $anchor_target = get_sub_field('anchors_buttons_items_target');
        ?>
          <div class="column is-narrow">
            <a
              href="#<?php echo $anchor_target ?>"
              class="column itgBlock__ItgAnchorsButtonsBar__anchor p1 itg-px-32 itg-py-16"
              style="color:<?php echo $anchor_color; ?>; border-style:solid;"
            >
              <span><?php echo $anchor_label; ?></span>
              <img src="<?php echo $anchor_icon; ?>" alt="Link Icon" class="itg-ml-8">
            </a>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div> 
<!-- "Torna su" Button -->
<div  id="itg_util_block_<?php echo $block_id; ?>_go_up_button"  class="itgBlock__ItgAnchorsButtonsBar__go_up_button " style="display:none;">
  <div class="">
    <a
      href="#itg_block_<?php echo $block_id; ?>"
      class="column itgBlock__ItgAnchorsButtonsBar__anchor p1 itg-px-32 itg-py-16"
      style="color:<?php echo $cta_color; ?>; border-style:solid;"
    >
      <span><?php echo $anchors_buttons_back_top_label; ?></span>
      <img src="<?php echo $go_up_icon; ?>" alt="Link Icon" class="itg-ml-8">
    </a>
  </div>
</div>