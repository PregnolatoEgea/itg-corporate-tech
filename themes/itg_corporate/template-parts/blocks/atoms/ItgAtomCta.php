<?php
$cta_link = get_sub_field('cta_link');
$cta_color = get_sub_field('cta_font_and_border_color');
$cta_icon_style = get_sub_field('cta_icon_style');
$cta_border_style = get_sub_field('cta_border_style');

switch ($cta_icon_style) {
  case '0':
    $cta_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/internal_page.svg';
    break;
  case '1':
    $cta_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/internal_page_white.svg';
    break;
  case '2':
    $cta_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/external_page.svg';
    break;
  case '3':
    $cta_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/rapid_link.png';
    break;
}

?>
<div class="columns is-marginless <?php if($is_centered){echo $is_centered;} ?>">
  <a
    target="<?php echo $cta_link['target']; ?>"
    href="<?php echo $cta_link['url']; ?>"
    class="column itgAtom__ItgCTA p1 itg-px-32 itg-py-16 <?php if($is_offset){echo $is_offset;} ?>"
    style="color:<?php echo $cta_color; ?>; border-style:<?php if($cta_border_style){echo $cta_border_style;} ?>"
  >
    <span><?php echo $cta_link['title']; ?></span>
    <img src="<?php echo $cta_icon; ?>" alt="Link Icon" class="itg-ml-8">
  </a>
</div>

<?php
?>