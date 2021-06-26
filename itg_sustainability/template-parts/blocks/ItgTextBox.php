
<?php 

$titolo = get_sub_field("text_box_title");
$titolo_style = get_sub_field("text_box_title_style_heading_style");
$testo = get_sub_field("text_box_paragraph");
$testo_style = get_sub_field("text_box_paragraph_style_paragraph_style");
?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-textBox <?php echo $enviroment; ?>">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-8">
        <?php if ($titolo): ?>
          <div class="<?= $titolo_style ?>"><<?= $titolo_style ?>><?= $titolo; ?></<?= $titolo_style ?>></div>
        <?php endif; ?>
        <?php if($testo): ?>
          <div class="<?= $testo_style ?>"><?= $testo; ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>