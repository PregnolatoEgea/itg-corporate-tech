<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Itg_Sustainability
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function itg_sustainability_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'itg_sustainability_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function itg_sustainability_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'itg_sustainability_pingback_header' );


class footer_menu_walker extends Walker_Nav_menu {
    function start_lvl (&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu f\">\n";
        $output .= "\n<div class=\"column\">\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n".($depth ? "$indent</div>\n" : "");
    }
}

add_filter('wp_nav_menu_objects' , 'my_menu_class');
function my_menu_class($menu) {
    $level = 0;
    $stack = array('0');
    foreach($menu as $key => $item) {
        while($item->menu_item_parent != array_pop($stack)) {
            $level--;
        }   
        $level++;
        $stack[] = $item->menu_item_parent;
        $stack[] = $item->ID;
        $menu[$key]->classes[] = 'level-'. ($level - 1);
    }                    
    return $menu;        
}

function pre_header_menu_reshape($menu)
{
    $reshape_data = [];

    foreach ($menu as $m1) {
	   $reshape_label = get_field('label_submenu', $m1);
	   
        if (empty($m1->menu_item_parent)) {

            $child_menu_first_level = [];

            foreach ($menu as $m2) {
                if ($m2->menu_item_parent == $m1->ID) {

                    $child_menu = [];
                    $child_menu_aux = [];

                    foreach ($menu as $m3) {
                        if ($m3->menu_item_parent == $m2->ID) {
                            array_push($child_menu_aux, $m3);

                            if (count($child_menu_aux) >= 1) {
                                array_push($child_menu, $child_menu_aux);
                                $child_menu_aux = [];
                            }
                        }
                    }

                    if (empty($child_menu) || (count($child_menu_aux) > 0 && count($child_menu_aux) < 1)) {
                        array_push($child_menu, $child_menu_aux);
                    }


                    $child_menu_first_level[$m2->title] = $child_menu;
                }
            }

            $reshape_data[$m1->ID] = $child_menu_first_level;
        }
        
        
    }

    return $reshape_data;
}


/* Media filter date range functions */
// --------------------------------
// Date filter recent
// --------------------------------
/*
add_action('asp_pre_parse_filters', 'asp_recent_filters', 10, 2);
function asp_recent_filters($search_id, $options) {
    if ( $search_id == 2 ) {
        $filter = wd_asp()->front_filters->create(
            'custom_field',
            'Recenti',
            'radio',
            array(
                'field' => '_date',
                'placeholder' => '',
                // The display date format
                'date_format' => 'dd/mm/yy',
                /**
                 * Date storage format (how the field contains the date)
                 *  datetime  => standard datetime format, ex.: 2001-03-10 17:16:18
                 *  timestamp => timestamp format, ex.: 1561971794
                 *  acf       => custom ACF format (YYYYMMDD): 20191231
                 
                'date_store_format' => 'timestamp'
            )
        );
        $filter->add(array(
            'label' => 'Ultimi 30 giorni',
            /**
             * Static values
             * '31/07/2019' => use this format only, DD/MM/YYYY
             * Relative values
             * ''         => no value displayed
             * '+0'       => current date
             * '+3m +4d'  => 3 months and 4 days from now
             * '-2m -10d' => 2 months and 10 days before now
             
            'value' => '-30d',
            'default' => '',
            
        ));
        
        $filter->add(array(
            'label' => 'Ultimi 6 mesi',
            /**
             * Static values
             * '31/07/2019' => use this format only, DD/MM/YYYY
             * Relative values
             * ''         => no value displayed
             * '+0'       => current date
             * '+3m +4d'  => 3 months and 4 days from now
             * '-2m -10d' => 2 months and 10 days before now
             
            'value' => '-6m',
            'default' => '',
            
        ));
        $filter->selectByOptions($options);
        
        wd_asp()->front_filters->add($filter);
    }
}
// --------------------------------
// Date filter periods
// --------------------------------
/*
add_action('asp_pre_parse_filters', 'asp_periods_from', 10, 2);
function asp_periods_from_filters($search_id, $options) {
    if ( $search_id == 2 ) {
        $filter = wd_asp()->front_filters->create(
            'custom_field',
            'Seleziona periodo',
            'dropdown',
            array(
                'field' => '_date',
                'placeholder' => '',
                // The display date format
                'date_format' => 'MM',
                /**
                 * Date storage format (how the field contains the date)
                 *  datetime  => standard datetime format, ex.: 2001-03-10 17:16:18
                 *  timestamp => timestamp format, ex.: 1561971794
                 *  acf       => custom ACF format (YYYYMMDD): 20191231
                 
                'date_store_format' => 'timestamp'
            )
        );
        $filter->add(array(
            'label' => 'Da',
            /**
             * Static values
             * '31/07/2019' => use this format only, DD/MM/YYYY
             * Relative values
             * ''         => no value displayed
             * '+0'       => current date
             * '+3m +4d'  => 3 months and 4 days from now
             * '-2m -10d' => 2 months and 10 days before now
             
            'value' => '-30d',
            'default' => '',
            
        ));
        
        $filter->selectByOptions($options);
        
        wd_asp()->front_filters->add($filter);
    }
}
*/
/* */
add_action('asp_pre_parse_filters', 'asp_periods_to_filters', 10, 2);
function asp_periods_to_filters($search_id, $options) {
    if ( $search_id == 2 ) {
        $filter = wd_asp()->front_filters->create(
            'custom_field',
            'Seleziona periodo',
            'date',
            array(
                'field' => '_date_from',
                'placeholder' => 'Recenti',
                // The display date format
                'date_format' => 'dd/mm/yy',
                /*
                 * Date storage format (how the field contains the date)
                 *  datetime  => standard datetime format, ex.: 2001-03-10 17:16:18
                 *  timestamp => timestamp format, ex.: 1561971794
                 *  acf       => custom ACF format (YYYYMMDD): 20191231
                 */
                'date_store_format' => 'datetime',
            ),
                 
        );
								$start = $month = strtotime('2020-02-01');
								$end = strtotime('2021-12-31');
								while($month < $end)
								{
								     //echo date('F Y', $month), PHP_EOL;
								     $month = strtotime("+1 month", $month);
								     // Creating timestamp from given date
													//$timestamp = strtotime(date("YYYYMMDD", $month));
													$new_datevalue = date("M/Y", $month); 
													// Creating new date format from that timestamp
													$new_date = date("Y-m-d", $month);
													
													//echo $new_date; // Outputs: 31-03-2019
													$filter->add(array(
			            'label' => date('F Y', $month), PHP_EOL,
			            /**
			             * Static values
			             * '31/07/2019' => use this format only, DD/MM/YYYY
			             * Relative values
			             * ''         => no value displayed
			             * '+0'       => current date
			             * '+3m +4d'  => 3 months and 4 days from now
			             * '-2m -10d' => 2 months and 10 days before now
			             */
			            'selected' => false,
			            'value' => $new_date,
			            'default' => false,
			            
															));
															
															
			        
								    
								}    
							 
        $filter->selectByOptions($options);
        
        wd_asp()->front_filters->add($filter);
    }
}
/*
add_action('asp_pre_parse_filters', 'asp_add_my_own_filters', 10, 2);
function asp_add_my_own_filters($search_id, $options) {
    if ( $search_id == 2 ) {
        $filter = wd_asp()->front_filters->create(
            'custom_field',
            'Date test',
            'datepicker',
            array(
                'field' => '_date',
                'placeholder' => '',
                // The display date format
                'date_format' => 'dd/mm/yy',
                /**
                 * Date storage format (how the field contains the date)
                 *  datetime  => standard datetime format, ex.: 2001-03-10 17:16:18
                 *  timestamp => timestamp format, ex.: 1561971794
                 *  acf       => custom ACF format (YYYYMMDD): 20191231
                
                'date_store_format' => 'datetime',
                'operator' => 'like'
            )
        );
        $filter->add(array(
            'label' => 'Ultimi 30 giorni',
            /**
             * Static values
             * '31/07/2019' => use this format only, DD/MM/YYYY
             * Relative values
             * ''         => no value displayed
             * '+0'       => current date
             * '+3m +4d'  => 3 months and 4 days from now
             * '-2m -10d' => 2 months and 10 days before now
             
            'value' => '',
            'default' => ''
        ));
        $filter->selectByOptions($options);
        
    }
}
*/