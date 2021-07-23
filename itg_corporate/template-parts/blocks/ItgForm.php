<?php
$form = get_field('layout');
?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgForm">
    <?php gravity_form($form, true, true, false, '', true, 1); ?>
</div>