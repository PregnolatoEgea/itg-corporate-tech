<?php //Follow bem syntax for css class naming http://getbem.com/naming/ 
  $title_style = get_sub_field('heading_style');
  $title = get_sub_field('heading_text');
  $icon = get_sub_field('icon');
  $copy_style = get_sub_field('paragraph_style');
  $copy = get_sub_field('paragraph_text');
  $background_color = get_sub_field('background_color');
  $padding_title_t = "itg-pt-24";
  $padding_copy_b = "itg-pb-24";


  ?>
<div id="itg_block_<?php echo $block_id; ?>" class=" itgBlock__ItgAccordionCarousel <?php echo $enviroment; ?>">
  <div class="container itg--background-color-<?php echo $background_color; ?> itg-px-64 itg-pb-56">
    <div class="columns is-flex is-12-desktop">
      <div class="itgBlock__ItgAccordionCarousel--content column is-7-desktop itg-pb-0 itg-pt-24 itg-pl-0 ">
        <div class="itgBlock__ItgAccordionCarousel--content--title <?= $title_style ?> itg-pb-16"><<?= $title_style ?>><?= $title; ?></<?= $title_style ?>></div>
        <div class="itgBlock__ItgAccordionCarousel--content--testo <?= $copy_style ?>"><?= $copy; ?></div>
      </div>
      <div class="itgBlock__ItgAccordionCarousel--image column itg-pl-0 itg-pr-0 itg-pb-32 itg-pt-24">
       <?php
        if($icon){
          ?>
            <div class="itgBlock__ItgAccordion--image itg-mb-24">
              <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
            </div>
          <?php
        }
       ?>
      </div>
    </div>
    <div class="columns is-multiline">
    <?php
    if( have_rows('accordion') ):

      while( have_rows('accordion') ) : the_row();

          $eyelet = get_sub_field('eyelet');
          
          ?>

              <div class="column is-12 itgBlock__ItgAccordion--single is-paddingless">
                <?php
                  if($eyelet){
                    ?>
                      <div class="itgBlock__ItgAccordion--eyelet itg-py-16 itg-pr-40">
                        <?php echo $eyelet; ?>
                      </div>
                    <?php
                  }
                ?>
                <div class="itgBlock__ItgAccordion--content">
                  <div class="columns is-desktop is-marginless is-centered">
                    <div class="column itgBlock__ItgAccordionCarousel--sliderContainer swiper-container is-12-touch is-10-desktop itg-px-0 itg-py-24 itg-pb-72">
                      <div class="itgBlock__ItgAccordionCarousel--sliderWrapper swiper-wrapper">
                        <?php
                          if( have_rows('cards') ):

                            while( have_rows('cards') ) : the_row();
                                $tipo_card = get_sub_field("tipologia_card");
                                $card_title = get_sub_field('title');
                                $card_copy = get_sub_field('descrizione');
                                $card_image = get_sub_field('image');
                                $padding_card_b = $tipo_card == "certificazione" ?  "": "itg-pb-72";
                                $card_percentage = get_sub_field('percentuale');
                                $percentage_class = 'p'.$card_percentage;
                            ?>
                              <div class="itgBlock__ItgAccordionCarousel--sliderWrapper-card is-4-desktop swiper-slide <?= $padding_card_b; ?> ">
                                <?php
                                  if($tipo_card == "certificazione") : 
                                    $padding_title_t = "itg-pt-16";
                                    $padding_copy_b = "itg-pb-40";
                                    $padding_card_b = "";
                                  ?>
                                    <div class="itgBlock__ItgAccordionCarousel--sliderWrapper-card--image itg-px-24 tg-pb-16 <?= $padding_title_t; ?>">
                                      <img src="<?= $card_image['url']; ?>">
                                    </div>
                                <?php
                                  endif; ?>
                                <div class="itgBlock__ItgAccordionCarousel--sliderWrapper-card--title p2 itg-px-24 <?= $padding_title_t; ?>"><?= $card_title; ?></div>
                                <div class="p1 itg-px-24 itg-pt-16 <?= $padding_copy_b; ?>"><?= $card_copy; ?></div>
                                <?php 
                                  if ($tipo_card == "azione") : ?>
                                    <div class="itgBlock__ItgAccordionCarousel--sliderWrapper-card--cert is-mobile">
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
                      <div class="itgBlock__ItgAccordionCarousel--sliderPagination swiper-pagination-accordion"></div>
                    </div>
                  </div>
                </div>
              </div>
              
          <?php

      endwhile;

    endif;
    ?>
  </div>

    


  </div>
</div>