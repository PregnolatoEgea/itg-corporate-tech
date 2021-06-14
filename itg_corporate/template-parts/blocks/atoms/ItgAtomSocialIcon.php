<?php
$link_color = get_sub_field('link_color_background_color');
$link = get_sub_field('link');
$social_type = get_sub_field('social_type');

switch ($social_type) {
  case 'facebook':
    $social_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/facebook.svg';
    break;
  case 'twitter':
    $social_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/twitter.svg';
    break;
  case 'youtube':
    $social_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/youtube.svg';
    break;
  case 'instagram':
    $social_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/instagram.svg';
    break;
  case 'linkedin':
    $social_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/linkedin.svg';
    break;
}

?>

<?php
if($link){
  ?>
    <a target="<?php echo $link['target']; ?>" href="<?php echo $link['url']; ?>" class="itgAtom__ItgSocialIcon is-<?php echo $social_type . ' itg--color-' . $link_color; ?>">
      <img class="itgAtom__ItgSocialIcon--image" src="<?php echo $social_icon; ?>" alt="Social Icon">
      <span class="itgAtom__ItgSocialIcon--copy p1 itg-ml-8"><strong><?php echo $link['title']; ?></strong></span>
    </a>
  <?php
}
?>

<?php
?>