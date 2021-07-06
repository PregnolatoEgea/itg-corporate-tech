<?php
  $title = get_sub_field('title');
  $text_color = get_sub_field("text_color");
  $fileImageColor = $text_color === "white" ? '' : 'blue-1';
  $fileNameColor = $text_color === "white" ? 'itg--color-white' : 'itg--color-blue-1';
  $fileSizeColor = $text_color === "white" ? 'itg--color-white' : 'itg--color-grey-1';

  if(count(get_sub_field('colonna_files')) === 1) {
    $class_colum = "is-6";
    $is_centered = "is-centered";
    $offset = "";
  } else {
    $class_colum = "is-5";
    $is_centered = "";
    $offset = "is-offset-1";
  }


?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-download_attach <?php echo $enviroment; ?>">
  <div class="container">
    <div class="columns <?= $is_centered ?>">
      <div class="column <?= $class_colum ?> <?= $offset ?>">
        <div class="itgBlock-download_attach__title h5">
          <?php echo $title ?>
        </div>
      </div>
    </div>

    <div class="columns is-centered">
      <?php
        if ( have_rows("colonna_files")):

          while ( have_rows("colonna_files") ) : the_row();  ?>
            <div class="column <?= $class_colum ?>">
            <?php
            if (have_rows('download_attach')):

              while( have_rows('download_attach') ) : the_row();
                $file = get_sub_field('file');
                $file_url = wp_get_attachment_url($file['ID']);
                $file_title = get_sub_field("nome_download_attach") ? get_sub_field("nome_download_attach") : get_the_title($file['ID']);
                $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);
                $file_size = filesize(get_attached_file($file['ID']));
                $file_size = size_format($file_size, 2);
              ?>
              <div class="itgBlock-download_attach__file itg-mb-24">
                <div class="itgBlock-download_attach__file-icon-container">
                  <div class="itgBlock-download_attach__file-icon-image <?php echo $fileImageColor; ?>"></div>
                </div>
                <div class="itgBlock-download_attach__file-title itg-pl-32">
                  <a href="<?php echo $file_url; ?>">
                    <span class="itgBlock-download_attach__file-title-1strow p2 <?php echo $fileNameColor; ?>">
                      <?php echo $file_title; ?><br>
                    </span>
                    <span class="itgBlock-download_attach__file-title-2ndrow p1 <?php echo $fileSizeColor; ?>">
                      File <?php echo strtoupper($file_ext); ?> - <?php echo $file_size; ?>
                    </span>
                  </a>
                </div>
              </div>
              <?php
              endwhile;
            endif; 
            ?>
          </div>
          <?php
          endwhile;
        endif;
        ?>
    </div>
  </div>
</div>