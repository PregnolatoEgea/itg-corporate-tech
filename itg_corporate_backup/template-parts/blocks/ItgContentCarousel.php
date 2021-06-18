<?php //Follow bem syntax for css class naming http://getbem.com/naming/ 
  $title_style = get_sub_field('heading_style');
  $titolo = get_sub_field("titolo");
  $testo = get_sub_field("testo");  
  $background_color = get_sub_field('background_color');
  $padding_title_t = "itg-pt-24";
  $padding_copy_b = "itg-pb-24";


  ?>
<div id="itg_block_<?php echo $block_id; ?>" class=" itgBlock__ItgContentCarousel <?php echo $enviroment; ?>">
  <div class="container itg--background-color-<?php echo $background_color; ?> itg-pl-64 itg-pr-40">
    <div class="columns is-desktop">
      <div class="itgBlock__ItgContentCarousel--content column is-6-desktop itg-pr-64 itg-pb-32 itg-pt-24">
        <div class="itgBlock__ItgContentCarousel--content--title itg-pb-16 <?= $title_style ?>">
        <?php if ($title_style) { echo "<" . $title_style .">"; } ?><?= $titolo; ?><?php if ($title_style) { echo "</" . $title_style .">"; } ?></div>
        <div class="itgBlock__ItgContentCarousel--content--testo p2"><?= $testo; ?></div>
      </div>
      <div class="column is-6-desktop itgBlock__ItgContentCarousel--sliderContainer swiper-container itg-px-0 itg-py-24">
        <div class="itgBlock__ItgContentCarousel--sliderWrapper swiper-wrapper">
          <?php
            if( have_rows('cards') ):

              while( have_rows('cards') ) : the_row();
                  $tipo_card = get_sub_field("tipologia_card");
                  $card_title = get_sub_field('title');
                  $card_copy = get_sub_field('descrizione');
                  $card_image = get_sub_field('image');
                  $card_percentage = get_sub_field('percentuale');
                  $percentage_class = 'p'.$card_percentage;
              ?>
                <div class="itgBlock__ItgContentCarousel--sliderWrapper-card is-4-desktop swiper-slide">
                  <?php
                    if($tipo_card == "certificazione") : 
                      $padding_title_t = "itg-pt-16";
                      $padding_copy_b = "itg-pb-40";
                    ?>
                      <div class="itgBlock__ItgContentCarousel--sliderWrapper-card--image itg-px-24 tg-pb-16 <?= $padding_title_t; ?>">
                        <img src="<?= $card_image['url']; ?>">
                      </div>
                  <?php
                    endif; ?>
                  <div class="itgBlock__ItgContentCarousel--sliderWrapper-card--title p2 itg-px-24  <?= $padding_title_t; ?>"><?= $card_title; ?></div>
                  <div class="p1 itg-px-24 itg-pt-16 <?= $padding_copy_b; ?>"><?= $card_copy; ?></div>
                  <?php 
                    if ($tipo_card == "azione") : ?>
                      <div class="itgBlock__ItgContentCarousel--sliderWrapper-card--cert is-mobile">
                        <div class="is-mobile columns">
                          <?php 
                            if ($card_percentage < 100) : ?>
                            <div class="progress-bar column ">
                              <div class="progress-pie-chart" data-percent="<?= $card_percentage ?>">
                                <div class="ppc-progress">
                                  <div class="ppc-progress-fill"></div>
                                </div>
                                <div class="ppc-percents">
                                  <div class="pcc-percents-wrapper">
                                    <span class="p2"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                            else : ?>
                            <div class="progress-bar column ">
                              <div class="progress-pie-chart " data-percent="<?= $card_percentage ?>">
                                <div class="ppc-progress">
                                  <div class="ppc-progress-fill"></div>
                                </div>
                                <div class="ppc-percents">
                                  <div class="pcc-percents-wrapper">
                                    <img src="<?php echo get_template_directory_uri() . '/src/images/icons/ic_check copy-ic_check.png'; ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                            endif; ?>
                          <div class="progress-bar column  has-text-right"><?= $card_percentage ?>%</div>
                        </div>
                      </div>
                  <?php
                    endif; ?>
                </div>

              <?php

              endwhile;

            endif;
          ?>
        </div>
      </div>
    </div>
    <div class="itgBlock__ItgContentCarousel--sliderPagination swiper-pagination"></div>
  </div>



</div>