<?php //Follow bem syntax for css class naming http://getbem.com/naming/ 
    $block_title = get_sub_field('title');
    $block_copy = get_sub_field('copy');
    $title_style = get_sub_field('title_style_heading_style');
    $copy_style = get_sub_field('copy_style_paragraph_style');

?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock__ItgStakeholder <?php echo $enviroment; ?>">
<?php
        if($block_title){
            ?>
            <div class="columns">
                <div class="itgBlock__ItgStakeholder--title column is-10 is-offset-1 <?php echo $title_style; ?>">
                    <<?php echo $title_style; ?>>
                        <?php echo $block_title; ?>
                    </<?php echo $title_style; ?>>    
                </div>
            </div>
            <?php
        }
    ?>
    <?php
        if($block_title){
            ?>
            <div class="columns">
                <div class="itgBlock__ItgStakeholder--copy column is-10 is-offset-1 <?php echo $copy_style; ?>">
                    <?php echo $block_copy; ?>
                </div>
            </div>
            <?php
        }
    ?>
    <?php
        if( have_rows('stakeholders') ):
            ?>
                <div class="columns">
                    <div class="itgBlock__ItgStakeholder--iconSlider swiper-container column is-10 is-offset-1 itg-mb-40 itg-mt-48">
                        <div class="swiper-wrapper">
                            <?php
                                while( have_rows('stakeholders') ) : the_row();

                                    $stakeholder_copy = get_sub_field('copy');
                                    $stakeholder_icon = get_sub_field('icon');

                                    ?>

                                        <div class="itgBlock__ItgStakeholder--iconSlider-single swiper-slide">
                                            <img src="<?php echo $stakeholder_icon['url']; ?>" alt="<?php echo $stakeholder_icon['alt'] ?>">
                                        </div>

                                    <?php

                                endwhile;                        
                            ?>
                        </div>             
                        <div class="itgBlock__ItgStakeholder--iconSlider-whiteHighlight"></div>
                    </div>
                </div>
            <?php

        endif;    
    ?>
    <?php
        if( have_rows('stakeholders') ):
            ?>
                <div class="columns">
                    <div class="itgBlock__ItgStakeholder--titleSlider swiper-container column is-8 is-offset-2">
                        <div class="swiper-wrapper">
                            <?php
                                while( have_rows('stakeholders') ) : the_row();

                                    $stakeholder_title = get_sub_field('title');
                                    $stakeholder_copy = get_sub_field('copy');
                                    $cta_color = get_sub_field('cta_color_text_color');

                                    ?>

                                        <div class="itgBlock__ItgStakeholder--titleSlider-single swiper-slide">
                                            <?php echo $stakeholder_title; ?>
                                            <a data-title='<?php echo $stakeholder_title; ?>' data-copy='<?php echo $stakeholder_copy; ?>' class="column itgAtom__ItgCTA p1 itg-px-16 itg-py-16 itg-mt-24 <?php if($cta_color){echo 'itg--color-' . $cta_color; } ?>">
                                                <span><?php _e('Leggi di più'); ?></span>
                                            </a>                                        
                                        </div>

                                    <?php

                                endwhile;                        
                            ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>                             
                    </div>
                </div>
            <?php

        endif;    
    ?>
    <div class="itgBlock__ItgStakeholder--popup column is-8 is-offset-2">
        <span class="itgBlock__ItgStakeholder--popup-close">
            <img src="<?php echo get_template_directory_uri(  ); ?>/dist/src/images/icons/close.svg" alt="Close">
        </span>
        <div class="itgBlock__ItgStakeholder--popup-copy">
            <div class="itgBlock__ItgStakeholder--popup-title"></div>
            <div class="itgBlock__ItgStakeholder--popup-content"></div>
        </div>
    </div>
</div> 