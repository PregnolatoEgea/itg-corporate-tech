<?php
  $background_color = get_sub_field('background_color');
  $title = get_sub_field('title');
  $paragraph = get_sub_field('paragraph');
  $heading_style = get_sub_field('heading_style');
  $paragraph_style = get_sub_field('paragraph_style');
  $titleCentered = strlen($paragraph) === 0 ? 'is-6-desktop is-offset-3' : 'is-12-desktop';
  $listCentered = strlen($paragraph) === 0 ? 'is-centered' : '';
  $filesSectionCentered = strlen($paragraph) === 0 ? 'is-6-desktop is-offset-3-desktop is-12-mobile' : 'is-5-desktop is-offset-1-desktop is-12-mobile';
  $fileImageColor = strlen($paragraph) === 0 ? 'blue-1' : '';
  $fileNameColor = strlen($paragraph) === 0 ? 'itg--color-black' : '';
  $fileSizeColor = strlen($paragraph) === 0 ? 'itg--color-grey-1' : '';
?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-report-list itg--background-color-<?php echo $background_color; ?> <?php echo $enviroment; ?>">
  <div class="columns is-variable is-6 is-multiline <?php echo $listCentered ?>">
    <div class="itgBlock-report-list__title column itg-mb-8 <?php echo $heading_style ?> is-12-mobile <?php echo $titleCentered; ?>">
      <<?php echo $heading_style ?>>
        <?php echo $title ?>
      </<?php echo $heading_style ?>>  
    </div>
    <div class="itgBlock-report-list__file-container column <?php echo $filesSectionCentered; ?>">
      <?php
        if (have_rows('files')):

          while( have_rows('files') ) : the_row();
            $file_id = get_sub_field('file');
            $file_url = wp_get_attachment_url($file_id);
            $file_title = get_the_title($file_id);
            $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);
            $file_size = filesize(get_attached_file($file_id));
            $file_size = size_format($file_size, 2);
      ?>
        <div class="itgBlock-report-list__file columns is-mobile is-variable is-0-mobile itg-mb-24">
          <div class="itgBlock-report-list__file-icon-container column is-2-desktop">
            <div class="itgBlock-report-list__file-icon-image <?php echo $fileImageColor; ?>"></div>
          </div>
          <div class="itgBlock-report-list__file-title column is-10-desktop is-8-mobile">
            <a href="<?php echo $file_url; ?>">
              <span class="itgBlock-report-list__file-title-1strow p2 <?php echo $fileNameColor; ?>">
                <?php echo $file_title; ?><br>
              </span>
              <span class="itgBlock-report-list__file-title-2ndrow p1 <?php echo $fileSizeColor; ?>">
                File <?php echo strtoupper($file_ext); ?> - <?php echo $file_size; ?>
              </span>
            </a>
          </div>
        </div>
      <?php
          endwhile;
      ?>
      <?php
        endif;
      ?>
    </div>
    <?php
      if (strlen($paragraph) > 0) {
    ?>
    <div class="itgBlock-report-list__description column is-6 is-12-mobile">
      <div class="<?php echo $paragraph_style ?> itgBlock-report-list__description-touch">
        <?php echo $paragraph ?>
      </div>
    </div>
    <?php
      }
    ?>
    <div class="column is-12 has-text-centered itg-mt-48">
      <?php
        if (get_sub_field('cta_link')) {
          $is_offset = 'is-offset-0';
          require 'atoms/ItgAtomCta.php';
        }
      ?>
    </div>
  </div>
</div>