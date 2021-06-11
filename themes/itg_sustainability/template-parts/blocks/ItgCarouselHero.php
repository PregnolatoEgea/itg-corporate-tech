<?php
$testo = get_sub_field('heading_text');
$img = get_sub_field('background_image');
$cta = get_sub_field('cta');
$paragrafo = get_sub_field('paragraph');
$contentclass = "";
?>
<div id="itg__block_<?php echo $block_id; ?>" class="ItgBlock-carouselhero <?php echo $environment; ?>">
    <div class="container">
        <div class="columns is-desktop <?= $classFlex; ?>" style="background-image: url(<?php echo $img['url'] ?>)">
            <div class="itgBlock-carouselhero__image column p-0 is-8-tablet-only">
                <img src="<?= $img['url']; ?>" alt="<?= $img['description'] ?>">
                <?php if (slider == true) ?>
                <div class=""
            </div>
        </div>
    </div>
</div>
