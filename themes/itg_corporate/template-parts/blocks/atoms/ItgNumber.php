<?php
$number = get_sub_field('number');
$title = get_sub_field('title');
$copy = get_sub_field('copy');
$show_percentage = get_sub_field('show_percentage');

?>
<div class="itgAtom-number columns has-text-centered itg-px-24 itg-pt-40 itg-pb-32">
  <div class="column is-paddingless">
    <div class="itgAtom-number__value itg-pb-16<?php echo ($text_color) ? " itg--color-$text_color" : '' ; ?>">
      <span><?php echo $number; ?></span><?php if ($show_percentage == '1') {?><span class="itgAtom-number__percentage">%</span><?php } ?>
    </div>
    <div class="itgAtom-number__title itg-pb-16<?php echo ($text_color) ? " itg--color-$text_color" : '' ; ?>"><?php echo $title; ?></div>
    <div class="itgAtom-number__copy<?php echo ($text_color) ? " itg--color-$text_color" : '' ; ?>"><?php echo $copy; ?></div>
  </div>
</div>
