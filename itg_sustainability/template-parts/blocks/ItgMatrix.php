<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgMatrix itg-mb-80 container <?php echo $enviroment; ?>">
    <div class="columns">
        <div class="itgBlock__ItgMatrix--categories column is-5-desktop">
        <?php
            $y_label = get_sub_field('y_label');
            $x_label = get_sub_field('x_label');
            $y_min_label = get_sub_field('y_min_label');
            $x_min_label = get_sub_field('x_min_label');
            $y_max_label = get_sub_field('y_max_label');
            $x_max_label = get_sub_field('x_max_label');
            if( have_rows('categories') ):

                while( have_rows('categories') ) : the_row();

                    $category_label = get_sub_field('category_label');
                    $category_color = get_sub_field('category_color');
                    ?>

                        <div class="itgBlock__ItgMatrix--category itg-mb-16 itg-py-24 itg-px-32" style="background-color: <?php echo $category_color; ?>" data-mark="<?php echo $category_label; ?>">
                            <div class="itgBlock__ItgMatrix--label">                            
                                <?php
                                    echo $category_label;
                                ?>
                                <img src="<?php echo get_template_directory_uri(  ) . '/dist/src/images/icons/arrow-navigate-close.svg'; ?>" class="itgBlock__ItgMatrix--icon" />
                            </div>
                            <div class="itgBlock__ItgMatrix--datum">
                                <?php
                                    if( have_rows('data') ):

                                        while( have_rows('data') ) : the_row();

                                            $datum_index = get_sub_field('index');
                                            $datum_label = get_sub_field('label');
                                            $datum_content = get_sub_field('content');
                                            ?>

                                                <span data-color="<?php echo $category_color; ?>" data-title="<?php echo $datum_index . '. ' . $datum_label; ?>" data-content="<?php echo $datum_content; ?>" class="itgBlock__ItgMatrix--datum-index">
                                                    <?php
                                                        echo $datum_index . '.' . ' ' . $datum_label;
                                                    ?>
                                                </span>

                                            <?php

                                        endwhile;

                                    endif;                                   
                                ?>
                            </div>
                        </div>

                    <?php

                endwhile;

            endif;                    
        ?>
        </div>
        <div class="itgBlock__ItgMatrix--matrix column is-7-desktop">
            <div class="itgBlock__ItgMatrix--matrix-container">
                <div class="itgBlock__ItgMatrix--matrix-y">
                    <span>
                        <?php
                            echo $y_label;
                        ?>
                    </span>
                </div>
                <div class="itgBlock__ItgMatrix--matrix-x">
                    <?php
                        echo $x_label;
                    ?>
                </div>
                <div class="itgBlock__ItgMatrix--matrix-min x">
                    <?php
                        echo $x_min_label;
                    ?>
                </div>
                <div class="itgBlock__ItgMatrix--matrix-max x">
                    <?php
                        echo $x_max_label;
                    ?>
                </div>
                <div class="itgBlock__ItgMatrix--matrix-min y">
                    <?php
                        echo $y_min_label;
                    ?>
                </div>
                <div class="itgBlock__ItgMatrix--matrix-max y">
                    <span>
                        <?php
                            echo $y_max_label;
                        ?>
                    </span>
                </div>
                <div class="itgBlock__ItgMatrix--graphic">
                    <span class="itgBlock__ItgMatrix--graphic-x zero"></span>
                    <span class="itgBlock__ItgMatrix--graphic-x one"></span>
                    <span class="itgBlock__ItgMatrix--graphic-y zero"></span>
                    <span class="itgBlock__ItgMatrix--graphic-y one"></span>
                    <span class="itgBlock__ItgMatrix--graphic-highlight"></span>
                    <?php
                        if( have_rows('categories') ):

                            while( have_rows('categories') ) : the_row();

                                $category_label = get_sub_field('category_label');
                                $category_color = get_sub_field('category_color');                    
                                if( have_rows('data') ):

                                    while( have_rows('data') ) : the_row();

                                        $datum_index = get_sub_field('index');
                                        $datum_label = get_sub_field('label');
                                        $datum_x_position = get_sub_field('x_position');
                                        $datum_y_position = get_sub_field('y_position');
                                        $datum_content = get_sub_field('content');

                                        ?>

                                            <span data-color="<?php echo $category_color; ?>" data-content="<?php echo $datum_content; ?>" data-title="<?php echo $datum_index . '. ' . $datum_label; ?>" data-tooltip="<?php echo $datum_index . '. ' . $datum_label; ?>" data-x="<?php echo $datum_x_position;?>" data-y="<?php echo $datum_y_position;?>" class="itgBlock__ItgMatrix--graphic-datum" style="
                                                <?php 
                                                    echo 'left:' . $datum_x_position .'%;'; 
                                                    echo 'bottom:' . $datum_y_position .'%;'; 
                                                    echo 'background-color:' . $category_color . ';'; 
                                                    echo 'color:' . $category_color . ';'; 
                                                ?>
                                            " data-mark="<?php echo $category_label; ?>">
                                            <span class="itgBlock__ItgMatrix--graphic-datum-single">
                                                <?php echo $datum_index; ?>
                                            </span>
                                            </span>

                                        <?php

                                    endwhile;

                                endif;                    
                            endwhile;

                        endif;                    
                    ?>
                </div>
            </div>
            <div class="itgBlock__ItgMatrix--clear itg-mt-24">
                <?php _e('Azzera filtri'); ?>
            </div>
        </div>
        <div class="itgBlock__ItgMatrix--popup column is-8-desktop is-offset-2">
            <span class="itgBlock__ItgMatrix--popup-close">
                <img src="<?php echo get_template_directory_uri(  ); ?>/dist/src/images/icons/close.svg" alt="Close">
            </span>
            <div class="itgBlock__ItgMatrix--popup-copy">
                <div class="itgBlock__ItgMatrix--popup-title"></div>
                <div class="itgBlock__ItgMatrix--popup-content"></div>
            </div>
        </div>
    </div>
</div>