<?php
  if(get_sub_field('layout') === "orizzontale") {
    $column_classes = 'is-12-mobile is-4';
    $columns_class = 'is-centered';
  }
  else {
    $column_classes = 'is-12-mobile is-6';
    $columns_class = '';
  }

?>
<div id="itg_block_<?php echo $block_id; ?>" class=" container itgBlock__iconList <?php echo $enviroment; ?>">
  <?php
    if( have_rows('icons') ): ?>

        <div class="itgBlock__iconList--container columns is-multiline <?= $columns_class ?>">

          <?php

          while( have_rows('icons') ) : the_row();

              $icon_image = get_sub_field('icona');
              $icon_title = get_sub_field('titolo');
              $icon_description = get_sub_field('descrizione');

              ?>

                <div class="itgBlock__iconList--single column <?= $column_classes ?> itg-mb-40">
                <?php if($icon_image) : ?>
                  <div class="itgBlock__iconList--single-img itg-mb-24">
                    <img src="<?= $icon_image['url'] ?>">
                  </div>
                <?php endif; ?>
                  <div class="itgBlock__iconList--single-content">
                    <div class="itgBlock__iconList--single-content_title h6 itg-mb-16">
                      <?= $icon_title ?>
                    </div>
                    <div class="itgBlock__iconList--single-content_description p1">
                      <?= $icon_description ?>
                    </div>
                  </div>
                </div>

              <?php

          ?>

          <?php

          endwhile;

      ?>

        </div>

      <?php

    endif;
  ?>
</div>
