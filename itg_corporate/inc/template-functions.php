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

                            if (count($child_menu_aux) >= 3) {
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

/*
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

			            'selected' => false,
			            'value' => $new_date,
			            'default' => false,

															));




								}


        $filter->selectByOptions($options);

        wd_asp()->front_filters->add($filter);
    }
}


// --------------------------------
// Date filter example
// --------------------------------
/*
add_action('asp_pre_parse_filters', 'asp_add_my_own_filters', 10, 2);
function asp_add_my_own_filters($search_id, $options) {
    if ( $search_id == 2 ) {
        $filter = wd_asp()->front_filters->create(
            'custom_field',
            'Date test',
            'date',
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
                'date_store_format' => 'datetime'
            )
        );
        $filter->add(array(
            'label' => 'Date test',
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
        wd_asp()->front_filters->add($filter);
    }
}

add_filter('asp_query_args', 'asp_date_filter_addition', 10, 2);
function asp_date_filter_addition($args, $id) {
    $field1 = '_date_from'; // Start date field, which has a filter
    $field2 = '_date_to'; // End date field, NO filter, this will be added automatically

    // --- DO NOT CHANGE ANYTHING BELOW ---
    if (isset($args['post_meta_filter'])) {
        foreach ($args['post_meta_filter'] as $k => $v) {
            // Is this the start date field?
            if ($v['key'] == $field1) {
                // Make sure that the current operator is correct
                $args['post_meta_filter'][$k]['operator'] = '<=';
                // And then create a new filter for the end date
                $args['post_meta_filter'][]               = array(
                    'key' => $field2,
                    'value' => $v['value'],
                    'operator' => '>='
                );
                break;
            }
        }
    }
    return $args;
}
*/
