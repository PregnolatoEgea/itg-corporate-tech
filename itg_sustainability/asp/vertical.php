<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

/**
 * This is the default template for one vertical result
 *
 * !!!IMPORTANT!!!
 * Do not make changes directly to this file! To have permanent changes copy this
 * file to your theme directory under the "asp" folder like so:
 *    wp-content/themes/your-theme-name/asp/vertical.php
 *
 * It's also a good idea to use the actions to insert content instead of modifications.
 *
 * WARNING: Modifying anything in this file might result in search malfunctioning,
 * so be careful and use your test environment.
 *
 * You can use any WordPress function here.
 * Variables to mention:
 *      Object() $r - holding the result details
 *      Array[]  $s_options - holding the search options
 *
 * I DO NOT RECOMMEND PUTTING ANYTHING BEFORE OR AFTER THE
 * <div class='item'>..</div><div class="asp_spacer"></div> structure
 *
 * You can leave empty lines for better visibility, they are cleared before output.
 *
 * MORE INFO: https://wp-dreams.com/knowledge-base/result-templating/
 *
 * @since: 4.0
 */
// $terms = get_the_terms( get_the_ID() );
?>
<div class='itgitem itg_aspcontent columns'>        
 <div class='column is-2 itgcatdatecol'>
         <?php  
            $itgcatname = get_the_category($r->id);
            foreach($itgcatname as $itgpost){ 
             $itgcatname = $itgpost->cat_name;
             $itglowcatname = strtolower($itgcatname);
            ?>
         <span class="itgmediacat">
             <?php echo $itgcatname; ?>
         </span>
         <div class="itgcatimage-<?php echo $itglowcatname ?>"></div>
         <?php 
             }
           ?>
         <div class="is-clearfix"></div>           
            <?php if ( $s_options['showdate'] == 1 && !empty($r->date) ): ?>
            <span class='itg_asp_date'><?php echo $r->date; ?></span>
            <?php endif; ?>

        </div>
        
         <?php if (!empty($r->image)): ?>
         <div class="column is-3">
                <a class='itg_aspres_image_url' href='<?php echo $r->link; ?>'<?php echo ($s_options['results_click_blank'])?" target='_blank'":""; ?>>
                    <div class='itg_aspimage' data-src="<?php echo esc_attr($r->image); ?>" style='background-image: url("<?php echo $r->image; ?>");'>
                        <div class='void'></div>
                    </div>
                </a>
            <?php do_action('asp_res_vertical_after_image'); ?>
         </div>

        <?php endif; ?>
        <div class="column is-6">
         <h3><a class="itg_aspres_url" href='<?php echo $r->link; ?>'<?php echo ($s_options['results_click_blank'])?" target='_blank'":""; ?>>
                 <?php echo $r->title; ?>
                 <?php if ($s_options['resultareaclickable'] == 1): ?>
                 <span class='overlap'></span>
                 <?php endif; ?>
         </a></h3>
                 <span class="itg_excerpt">
                     <?php echo $r->content; ?>
                     <?php bloginfo('the_excerpt'); ?>
                 </span>

        </div>      
    </div>
