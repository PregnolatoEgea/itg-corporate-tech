
<?php 

$titolo = get_sub_field("text_box_title");
$titolo_style = get_sub_field("text_box_title_style_heading_style");
$testo = get_sub_field("text_box_paragraph");
$testo_style = get_sub_field("text_box_paragraph_style_paragraph_style");

$text_box_columns = get_sub_field("text_box_columns_heading_columns"); //is-10
$text_box_background_color = get_sub_field("text_box_background_color_background_color"); //light-blue

$text_box_title_color = get_sub_field("text_box_title_color_text_color"); //blue-
$text_box_paragraph_color = get_sub_field("text_box_paragraph_color_text_color"); //blue-3


$cta_link = get_sub_field("cta_link"); //a:3:{s:5:"title";s:19:"Dialogo e priorità";s:3:"url";s:47:"https://itg-corporate.local/dialogo-e-priorita/";s:6:"target";s:0:"";}
$downloads = get_sub_field("text_box_downloads"); // list of downloads


?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-textBox <?php echo $enviroment; ?>">
  <div class="container itg--background-color-<?php echo $text_box_background_color; ?>" >
    <div class="columns is-centered is-mobile">
      <div class="column <?php if($text_box_columns){ echo $text_box_columns; }else{ echo 'is-8'; };  ?>">
        <?php if ($titolo): ?>
          <div class="<?= $titolo_style ?> itg--color-<?php echo $text_box_title_color; ?>">
            <<?= $titolo_style ?>>
              <?= $titolo; ?> 
            </<?= $titolo_style ?>></div>
        <?php endif; ?>
        <?php if($testo): ?>
          <div class="<?= $testo_style ?> itg--color-<?php echo $text_box_paragraph_color; ?>">
            <?= $testo; ?>
          </div>
        <?php endif; ?>
        <?php
          if($cta_link){
            require 'atoms/ItgAtomCta.php';
          }
        ?>      
      <!-- Download Start -->      
      <?php
        if ( have_rows("text_box_downloads")):
          ?>
          <div class="columns is-centered itg-mt-40">
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

            <div class="column">
              <div class="itgBlock-textBox__file itg-mb-24">
                <div class="itgBlock-textBox__file-icon-container">
                  <div class="itgBlock-textBox__file-icon-image <?php echo $fileImageColor; ?>"></div>
                </div>
                <div class="itgBlock-textBox__file-title itg-pl-32">
                  <a href="<?php echo $file_url; ?>">
                    <span class="itgBlock-textBox__file-title-1strow p2 <?php echo $fileNameColor; ?>">
                      <?php echo $file_title; ?><br>
                    </span>
                    <span class="itgBlock-textBox__file-title-2ndrow p1 <?php echo $fileSizeColor; ?>">
                      File <?php echo strtoupper($file_ext); ?> - <?php echo $file_size; ?>
                    </span>
                  </a>
                </div>
              </div>
            </div>            
          <?php
          endwhile;
          ?></div>
          <?php          
        endif;
        ?>
      </div>
    </div>
  </div>
</div>