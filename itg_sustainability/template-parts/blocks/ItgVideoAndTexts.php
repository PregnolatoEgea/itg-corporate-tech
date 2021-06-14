<?php
$video_and_texts_title = get_sub_field('video_&_texts_title');
$video_and_texts_title_style = get_sub_field('video_&_texts_title_style_heading_style');
$video_and_texts_copy = get_sub_field('video_&_texts_copy');
$video_and_texts_copy_style = get_sub_field('video_&_texts_copy_style_paragraph_style');
?>

<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__VideoAndTexts container itg-mb-80 <?php echo $enviroment; ?>">
  <div class="columns is-desktop">
    <div class="itgBlock__VideoAndTexts--copies column is-7-desktop is-10-touch">
      <div class="columns">
        <?php
          if($video_and_texts_title){
            ?>
              <div class="itgBlock__VideoAndTexts--title column <?php echo $video_and_texts_title_style; ?>"><<?php echo $video_and_texts_title_style; ?>><?php echo $video_and_texts_title; ?></<?php echo $video_and_texts_title_style; ?>></div>
            <?php
          }
        ?>
        </div>
        <div class="columns">
        <?php
          if($video_and_texts_copy){
            ?>
              <div class="itgBlock__VideoAndTexts--copy column is-10-desktop is-offset-2-desktop <?php echo $video_and_texts_copy_style; ?>"><?php echo $video_and_texts_copy; ?></div>
            <?php
          }
        ?>
      </div>
    </div>
    <div class="itgBlock__VideoAndTexts--videoAtom column is-5-desktop">
      <?php require 'atoms/ItgAtomVideo.php' ; ?>
    </div>
  </div>
</div>