<?php
  $testo = get_sub_field("testo");
  $titolo = get_sub_field("titolo_blocco");
  $allineamentoImg = get_sub_field("allineamento_immagine_a_destra");
  $imgSize = (get_sub_field("dimensione_immagine") !== false) ? get_sub_field("dimensione_immagine") : 'is-5-desktop';
  $img = get_sub_field("immagine");
  $contentClass = "";

  if ($allineamentoImg === true || $allineamentoSliderImg === true) {
    $classFlex="reverse";
    $imgClass = $imgSize;
    if ($imgSize == "is-6-desktop") $contentClass = "translate_me";
  }
  else{
    $classFlex = "default";
    if ($imgSize == "is-5-desktop") $imgClass = $imgSize." is-offset-1-desktop";
    elseif ($imgSize == "is-4-desktop") $imgClass = $imgSize." is-offset-2-desktop";
    else $imgClass = $imgSize;
  }

  if($titolo) $classTesto = "text-p2";
  else $classTesto = "text-p4";

  // se c'è titolo p2 e non c'è titolo p4 --

?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-singleLaunch <?php echo $enviroment; ?>">
  <div class="container">
    <div class="columns is-desktop <?= $classFlex; ?>">
      <div class="itgBlock-singleLaunch__image column p-0 is-8-tablet-only <?= $imgClass; ?>">
        <img src="<?= $img['url']; ?>" alt="<?= $img['description']; ?>">
        <?php if ($slider === true) : ?>
        <div class="itgBlock-singleLaunch__image-layer">
          <div class="itgBlock__ItgCarouselLaunches--buttons is-hidden-touch itg-py-32 itg-px-48">
            <div class="swiper-button-prev swiper-button-prev--white itgBlock__ItgCarouselLaunches--button itg-mr-24 itgBlock__ItgCarouselLaunches--button-prev"></div>
            <div class="swiper-button-next swiper-button-next--white itgBlock__ItgCarouselLaunches--button itgBlock__ItgCarouselLaunches--button-next"></div>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <div class="itgBlock-singleLaunch__content column is-7-desktop itg-py-40 <?= $contentClass; ?>">
      <?php if ($slider === true) : ?>
        <div class="itgBlock__ItgCarouselLaunches--buttons is-hidden-desktop itg-pb-24">
          <div class="swiper-button-prev itgBlock__ItgCarouselLaunches--button itg-mr-24 itgBlock__ItgCarouselLaunches--button-prev"></div>
          <div class="swiper-button-next itgBlock__ItgCarouselLaunches--button itgBlock__ItgCarouselLaunches--button-next"></div>
        </div>
        <?php endif; ?>
        <?php if($titolo) : ?>
        <div class="itgBlock-singleLaunch__content-title itg-pb-24">
          <?= $titolo; ?>
        </div>
        <?php endif; ?>
        <?php if($testo) : ?>
          <div class="itgBlock-singleLaunch__content-text <?= $classTesto; ?> itg-pb-24">
            <?= $testo; ?>
          </div>
        <?php endif; ?>
        <?php
          if(get_sub_field('cta_link')){
            require 'atoms/ItgAtomCta.php';
          }
        ?>
      </div>
    </div>
  </div>
</div>