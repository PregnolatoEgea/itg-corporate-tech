<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgAccordion itg-mb-80 container <?php echo $enviroment; ?>">
  <?php
    if( have_rows('accordion') ):

      while( have_rows('accordion') ) : the_row();

          $eyelet = get_sub_field('eyelet');
          $title_style = get_sub_field('title_style_heading_style');
          $title = get_sub_field('title');
          $image = get_sub_field('image');
          $copy_style = get_sub_field('copy_style_paragraph_style');
          $copy = get_sub_field('copy');
          $download_label_style = get_sub_field('download_label_style_paragraph_style');
          $download_label = get_sub_field('download_label');
          $download_file = get_sub_field('download_file');

          ?>

            <div class="columns is-marginless">
              <div class="column is-8 is-offset-2 itgBlock__ItgAccordion--single itg-mb-24 is-paddingless">
                <?php
                  if($eyelet){
                    ?>
                      <div class="itgBlock__ItgAccordion--eyelet itg-px-48 itg-py-24">
                        <?php echo $eyelet; ?>
                      </div>
                    <?php
                  }
                ?>
                <div class="itgBlock__ItgAccordion--content">
                  <div class="itgBlock__ItgAccordion--inner-content itg-px-48 itg-py-40">
                    <?php
                      if($image){
                        ?>
                          <div class="itgBlock__ItgAccordion--image itg-mb-24 has-text-align-center">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                          </div>
                        <?php
                      }
                      if($title){
                        ?>
                          <div class="itgBlock__ItgAccordion--title <?php if($title_style){echo $title_style;} ?>">
                            <<?php if($title_style){echo $title_style;} ?>>
                              <?php echo $title; ?>
                            </<?php if($title_style){echo $title_style;} ?>>  
                          </div>
                        <?php
                      }
                      if($copy){
                        ?>
                          <div class="itgBlock__ItgAccordion--copy <?php if($copy_style){echo $copy_style;} ?>">
                            <?php echo $copy; ?>
                          </div>
                        <?php
                      }
                      if($download_file){
                        ?>
                          <div class="itgBlock__ItgAccordion--link <?php if($download_label_style){echo $download_label_style;} ?>">
                            <a href="<?php echo $download_file['url']; ?>"><?php echo $download_label; ?></a>
                          </div>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>


          <?php

      endwhile;

    endif;
  ?>
</div>