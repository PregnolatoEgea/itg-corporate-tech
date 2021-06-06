<?php
$embedding_type = get_sub_field('embedding_type');
$video_source = get_sub_field('video_source');
$video_poster = get_sub_field('video_poster');
$youtube_id = get_sub_field('youtube_id');
$vimeo_id = get_sub_field('vimeo_id');
$cta_link = get_sub_field('cta_link');
$cta_font_and_border_color = get_sub_field('cta_font_and_border_color');
$cta_icon_style = get_sub_field('cta_icon_style');
$eyelet = get_sub_field('eyelet');
$title = get_sub_field('title');
$eyelet_style = get_sub_field('eyelet_style_heading_style');
$title_style = get_sub_field('title_style_heading_style');

?>

<div class="itgAtom__ItgVideo">
<?php
switch ($embedding_type) {
  case 'none':
    ?>
      <div class="itgAtom__ItgVideo--noVideo">
        <?php if($eyelet || $title){
          require 'ItgLancioCopy.php';
        } ?>
        <div class="itgAtom__ItgVideo--video image">
          <div class="itgAtom__ItgVideo--overlay"></div>
          <img src="<?php echo $video_poster['url']; ?>" alt="<?php echo $video_poster['alt']; ?>">
        </div>
      </div>
    <?php
  break;
  case 'server':
    ?>
      <div class="itgAtom__ItgVideo--onServer">
        <?php
          if($eyelet || $title){
            require 'ItgLancioCopy.php';
          }
          if($video_source){
            $video_source_url = $video_source['url'];
            ?>
              <div class="itgAtom__ItgVideo--video image">
                <div class="itgAtom__ItgVideo--overlay"></div>
                <img src="<?php echo $video_poster['url']; ?>" alt="<?php echo $video_poster['alt']; ?>">
                <video controls <?php if($video_poster){ ?> poster="<?php echo $video_poster['url']; ?>" <?php } ?> src="<?php echo $video_source_url; ?>"></video>
              </div>
            <?php
          }
        ?>
      </div>
    <?php
  break;
  case 'vimeo':
    ?>
      <div class="itgAtom__ItgVideo--onVimeo">
        <?php
          if($eyelet || $title){
            require 'ItgLancioCopy.php';
          }
          if($vimeo_id){
            ?>
              <div class="itgAtom__ItgVideo--video image">
                <div class="itgAtom__ItgVideo--overlay"></div>
                <img src="<?php echo $video_poster['url']; ?>" alt="<?php echo $video_poster['alt']; ?>">
                <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
              </div>
            <?php
          }
        ?>
      </div>
    <?php
  break;
  case 'youtube':
    ?>
      <div class="itgAtom__ItgVideo--onVimeo">
        <?php
          if($eyelet || $title){
            require 'ItgLancioCopy.php';
          }
          if($youtube_id){
            ?>
              <div class="itgAtom__ItgVideo--video image">
                <div class="itgAtom__ItgVideo--overlay"></div>
                <img src="<?php echo $video_poster['url']; ?>" alt="<?php echo $video_poster['alt']; ?>">
                <iframe src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>"></iframe>
              </div>
            <?php
          }
        ?>
      </div>
    <?php
  break;
}
if($cta_link){
  require 'ItgAtomCta.php' ;
}
?>
</div>