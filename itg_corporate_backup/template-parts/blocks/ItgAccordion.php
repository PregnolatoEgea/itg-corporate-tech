<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgAccordion itg-mb-80 itg-pt-100 container <?php echo $enviroment; ?>">
  <?php
    if( have_rows('accordion') ):

      while( have_rows('accordion') ) : the_row();

          $accordion_columns = get_sub_field("text_box_columns_heading_columns");
          $eyelet = get_sub_field('eyelet');
          $accordion_background_color = get_sub_field("background_color");
          $image = get_sub_field('image');      
          

          ?>

            <div class="columns is-marginless is-mobile is-centered">
              <div class="column is-10  itgBlock__ItgAccordion--single itg-mb-24 is-paddingless">
                <?php
                  if($eyelet):
                    ?>
                      <div class="itgBlock__ItgAccordion--eyelet itg-px-48 itg-py-24">
                        <?php echo $eyelet; ?>
                      </div>
                    <?php
                  endif;
                ?>
                <div class="itgBlock__ItgAccordion--content">
                  <div class="itgBlock__ItgAccordion--inner-content itg--background-color-<?php echo $accordion_background_color; ?>">
                    <div class="columns is-mobile is-centered">
                      <div class="column is-10">
                        <?php
                          if($image):
                            ?>
                              <div class="itgBlock__ItgAccordion--image itg-mt-24 itg-mb-24 has-text-align-center">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                              </div>
                            <?php
                          endif;

                          while( have_rows('blocks') ) : the_row();


                          $text_box_background_color = get_sub_field("text_box_background_color_background_color");          
                          $title_style = get_sub_field('text_box_title_style_heading_style');
                          $title = get_sub_field('text_box_title');
                          $title_color = get_sub_field("text_box_title_color_text_color");          

                          $copy = get_sub_field("text_box_paragraph");
                          $copy_style = get_sub_field("text_box_paragraph_style_paragraph_style");
                          $copy_color = get_sub_field("text_box_paragraph_color_text_color"); 

                          $accordion_cta_link = get_sub_field("cta_link");

                          $download_label_style = get_sub_field('download_label_style_paragraph_style');
                          $download_label = get_sub_field('download_label');
                          $download_file = get_sub_field('download_file');

                          $accordion_table = get_sub_field('table');

                          
                            if($title):
                              ?>
                                <div class="itgBlock__ItgAccordion--title <?php if($title_style){echo $title_style;} ?>  itg--color-<?php echo $title_color; ?>">
                                  <<?php if($title_style){echo $title_style;} ?>>
                                    <?php echo $title; ?>
                                  </<?php if($title_style){echo $title_style;} ?>>  
                                </div>
                              <?php
                            endif;
                            if($copy):
                              ?>
                                <div class="itgBlock__ItgAccordion--copy <?php if($copy_style){echo $copy_style;} ?> itg--color-<?php echo $text_box_paragraph_color; ?>">
                                  <?php echo $copy; ?>
                                </div>
                              <?php
                            endif;
                            if($accordion_cta_link):
                              ?>
                                <div class="itgBlock__ItgAccordion--link itg-mb-24">
                                  <a target="<?php echo $accordion_cta_link['target']; ?>" href="<?php echo $accordion_cta_link['url']; ?>" > 
                                    <?php echo $accordion_cta_link['title']; ?> >
                                  </a>
                                </div>
                              <?php
                            endif;
                          ?>
                          
                          <!-- Download Start -->      
                          <?php                          
                              while ( have_rows("text_box_downloads") ) : the_row();  ?>
                                <?php
                                  $fileName = get_sub_field('text_box_downloads_name');
                                  $fileColor = get_sub_field('text_box_downloads_color_text_color');
                                  $fileData = get_sub_field('text_box_downloads_file');

                                  /* get file data */
                                  $file_url = wp_get_attachment_url($fileData['ID']);
                                  $file_title = $fileName;
                                  $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);
                                  $file_size = filesize(get_attached_file($fileData['ID']));
                                  $file_size = size_format($file_size, 2);

                                  /* set color */
                                  $fileImageColor = $fileColor === "white" ? '' : 'blue-1';
                                  $fileNameColor = $fileColor === "white" ? 'itg--color-white' : 'itg--color-blue-1';
                                  $fileSizeColor = $fileColor === "white" ? 'itg--color-white' : 'itg--color-grey-1';
                                ?>
                                <div class="columns is-centered is-marginless is-mobile">
                                  <div class="column">
                                    <div class="itgBlock__ItgAccordion__file itg-mb-24">
                                      <a href="<?php echo $file_url; ?>">
                                        <div class="itgBlock__ItgAccordion__file-icon-container">
                                          <div class="itgBlock__ItgAccordion__file-icon-image <?php echo $fileImageColor; ?>"></div>
                                        </div>
                                      </a>
                                      <div class="itgBlock__ItgAccordion__file-title itg-pl-32">
                                        <a href="<?php echo $file_url; ?>">
                                          <span class="itgBlock__ItgAccordion__file-title-1strow p2 <?php echo $fileNameColor; ?>">
                                            <?php echo $file_title; ?><br>
                                          </span>
                                          <span class="itgBlock__ItgAccordion__file-title-2ndrow p1 <?php echo $fileSizeColor; ?>">
                                            File <?php echo strtoupper($file_ext); ?> - <?php echo $file_size; ?>
                                          </span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>    
                              </div>              
                            <?php
                            endwhile;
                            ?>
                            <!-- Download End --> 
                            <?php
                              if($accordion_table):
                              ?>
                              <div class="itgBlock__ItgAccordion--link itg-mb-24 columns is-marginless">
                                <div class="column">
                                  <?php echo $accordion_table; ?>
                                </div>
                              </div>
                            <?php
                              endif;
                          endwhile; ?>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
      endwhile;
    endif;
  ?>
</div>