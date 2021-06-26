<?php //Follow bem syntax for css class naming http://getbem.com/naming/
$background_color = get_sub_field('background_color');?>
<div id="itg_block_<?php echo $block_id; ?>" class="swiper-container itgBlock__ItgCarouselNumbers elenco-dati container <?php echo $enviroment; ?> itg--background-color-<?php echo $background_color; ?>">
    <div class="swiper-wrapper itgBlock__ItgCarouselNumbers--sliderWrapper columns itg-mt-0 itg-mx-0 itg-mb-0">
        <?php
        $columnWidth = (count(get_sub_field('numbers')) == 4) ? 'is-3' : 'is-4' ;
        $text_color = get_sub_field('text_color');
        $header_text = get_sub_field('header_text');

        if( have_rows('numbers') ):

            while( have_rows('numbers') ) : the_row();
                ?>
                <div class="testo-blocco mb-4 mx-20 my-20 py-20 px-20"><?php echo $header_text; ?></div>
                <div class="swiper-slide itgBlock__ItgCarouselNumbers--single column is-12-mobile <?php echo $columnWidth; ?> is-paddingless itg--background-color-<?php echo $background_color; ?>">
                    <?php
                    require 'atoms/ItgNumber.php';
                    ?>
                </div>
            <?php

            endwhile;

        endif;
        ?>
    </div>
    <div class="swiper-pagination itgBlock__ItgCarouselNumbers--pagination"></div>
</div>
