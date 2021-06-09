
<?php
$titolo_testo = get_sub_field("text_box_title");
$titolo_style = get_sub_field("text_box_title_style_heading_style");
$testo = get_sub_field("text_box_paragraph");
$testo_style = get_sub_field("text_box_paragraph_style_paragraph_style");
$column_width = (count(get_sub_field('related_launch_1_e_2')) == 2) ? 'is-5-desktop' : 'is-4-desktop' ;
?>

<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-relatedLaunchesType12 <?php echo $enviroment; ?>">
  <?php
    if (have_rows('related_launch_1_e_2')): ?>
    <div class="container">
      <div class="columns is-desktop is-centered">
          <?php
          while( have_rows('related_launch_1_e_2') ) : the_row(); ?>
          <div class="column is-12-mobile <?= $column_width ?> ">
          <?php
              $img = get_sub_field("immagine")["url"];
              $titolo_articolo = get_sub_field("titolo_link");
              $testo_articolo = get_sub_field("testo");
          ?>
          <div class="itgBlock-relatedLaunchesType12__item">
            <div class="itgBlock-relatedLaunchesType12__item-img">
              <img src="<?= $img; ?>">
            </div>
            <div class="itgBlock-relatedLaunchesType12__item-content itg-px-32">
              <div class="itgBlock-relatedLaunchesType12__item-title h6 itg-pb-16">
                <?= $titolo_articolo; ?>
              </div>
              <div class="itgBlock-relatedLaunchesType12__item-text p2">
                <?= $testo_articolo; ?>
              </div>
              <?php
              if(get_sub_field('cta_link')){ ?>
                <div class="itgBlock-relatedLaunchesType12__item-cta itg-mt-40">
                  <?php
                    $is_offset = '';
                    require 'atoms/ItgAtomCta.php'; ?>
                </div>
              <?php
                }
              ?>
            </div>


          </div>
</div>
          <?php
          endwhile; ?>
      </div>
    </div>
    <?php
    endif; ?>
</div>