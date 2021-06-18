
<?php
$titolo_testo = get_sub_field("text_box_title");
$titolo_style = get_sub_field("text_box_title_style_heading_style");
$testo = get_sub_field("text_box_paragraph");
$testo_style = get_sub_field("text_box_paragraph_style_paragraph_style");
?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-relatedLaunchesType3 <?php echo $enviroment; ?>">
  <?php
    if (have_rows('related_launch')): ?>
    <div class="container">
      <?php
        if(get_sub_field("titolo_blocco")) { ?>
          <h5><?= get_sub_field("titolo_blocco"); ?></h5>
      <?php
      }
      ?>
      <div class="columns is-desktop">
        <div class="column is-5-desktop is-offset-1-desktop">
          <?php
          while( have_rows('related_launch') ) : the_row();
            $img = get_sub_field("immagine")["url"];

            if(get_sub_field(("link_esterno"))) {
              $titolo_articolo = get_sub_field("titolo_link");
              $link = get_sub_field("link");
              $target = "_blank";

            }
            else {
              $articolo = get_sub_field("articolo")[0];
              $titolo_articolo = $articolo->post_title;
              $link = get_permalink($articolo->ID);
              $target = "_self";
            }
          ?>
          <div class="itgBlock-relatedLaunchesType3__item itg-mt-24">
            <div class="itgBlock-relatedLaunchesType3__item-img">
              <img src="<?= $img; ?>">
            </div>
            <div class="itgBlock-relatedLaunchesType3__item-content itg-pl-48">
              <div class="itgBlock-relatedLaunchesType3__item-title p2">
                <?= $titolo_articolo; ?>
              </div>
              <div class="itgBlock-relatedLaunchesType3__item-cta itg-px-24">
                <a href="<?= $link ?>"  target="<?= $target; ?>"><img src="<?php echo get_template_directory_uri(  ) . '/dist/src/images/icons/internal_page.svg'; ?>"></a>
              </div>
            </div>


          </div>

          <?php
          endwhile; ?>
        </div>
        <div class="column is-5-desktop">
          <?php if ($titolo_testo): ?>
            <div class="<?= $titolo_style; ?>"><<?= $titolo_style; ?>><?= $titolo_testo; ?></<?= $titolo_style; ?>></div>
          <?php endif; ?>
          <?php if($testo): ?>
            <div class="<?= $testo_style ?>"><?= $testo; ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php
    endif; ?>
</div>