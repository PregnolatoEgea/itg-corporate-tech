<?php
  $testoBlocco = get_sub_field('testo_blocco');
  $ctaBlocco = get_sub_field("cta_blocco_cta_link");
?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-infogram <?php echo $enviroment; ?>">
  <div class="container">
    <div class="columns is-centered is-desktop">
      <?php
        $class_colum = count(get_sub_field('colonna_infogram')) === 1 ? "is-10-deskop" : "is-6-desktop";
        if ( have_rows("colonna_infogram")):

          while ( have_rows("colonna_infogram") ) : the_row();  ?>
            <div class="column <?= $class_colum ?>">
              <?php
                $embedDesktop = get_sub_field('codice_embed_desktop');
                $embedTablet = get_sub_field('codice_embed_tablet');
                $embedMobile = get_sub_field('codice_embed_mobile');
                $testoColonna = get_sub_field("testo_singola_colonna");
                $ctaColonna = get_sub_field("cta_singola_colonna_cta_link");            
              ?>
              <div class="itgBlock-infogram__item">
                <div class="itgBlock-infogram__item-embed is-hidden-touch itg-pb-40">
                  <?= $embedDesktop; ?>
                </div>
                <div class="itgBlock-infogram__item-embed is-hidden-mobile is-hidden-desktop itg-pb-40">
                  <?= $embedTablet; ?>
                </div>
                <div class="itgBlock-infogram__item-embed is-hidden-tablet itg-pb-40">
                  <?= $embedMobile; ?>
                </div>
                <?php if($testoColonna) : ?>
                  <div class="itgBlock-infogram__item-text has-text-centered p2 itg-mb-56">
                    <?= $testoColonna; ?>
                  </div>
                <?php endif; ?>
                <?php if($ctaColonna) : ?>
                  <div class="itgBlock-infogram__item-cta has-text-centered itg-mb-56">
                    <?php require 'atoms/ItgAtomCta.php'; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php
          endwhile;
        endif;
        ?>
    </div>
    <?php if($testoBlocco) : ?>
      <div class="columns is-centered">
        <div class="column is-8-desktop has-text-centered p2 itg-mb-56">
          <?= $testoBlocco; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if($ctaBlocco) : ?>
      <div class="columns is-centered">
        <div class="column is-8-desktop is-12-touch has-text-centered itg-mb-56">
          <?php require 'atoms/ItgAtomCta.php'; ?>
        </div>
    </div>
    <?php endif ?>
  </div>
</div>