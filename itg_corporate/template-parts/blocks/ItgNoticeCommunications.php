
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-ItgNoticesCommunications <?php echo $enviroment; ?> itg--background-color-blue-1">
<?php 


$currentYear = date("Y"); 
$tabLabels = [];

$tabLabels[] = $currentYear;
for ($i = 1; $i <= 5; $i++) {
    $tabLabels[] = $currentYear - $i;
}


if( have_rows('notices_and_communications') ):

    while( have_rows('notices_and_communications') ) : the_row();
    
    
        $notices_and_communications_title = get_sub_field("notices_and_communications_title");
        $notices_and_communications_date = get_sub_field("notices_and_communications__date");
                

        if( have_rows('notices_and_communications_items') ):
            while( have_rows('notices_and_communications_items') ) : the_row();

                $notices_and_communications_item_label = get_sub_field("notices_and_communications_items_label");
                $notices_and_communications_item_download_file = get_sub_field("notices_and_communications_download_file");
                                
            endwhile;
        endif;
    endwhile;
endif;
?>
  <div class="container" >
    <div class="columns is-centered">
      <div class="column itgBlock-ItgNoticesCommunications__container">
        <div class="h4 itgBlock-ItgNoticesCommunications__title itg--color-white">
            <h4>
                <?php echo _e('Avvisi e comunicazioni'); ?>
            </h4>
        </div>
        <div class="columns is-centered is-vcentered ">
            <div class="column itgBlock-ItgNoticesCommunications__tab-list is-10 is-offset-desktop-2">
                <div class="columns is-marginless is-vcentered is-mobile">
                    <?php foreach ($tabLabels as $tabLabel):  ?>
                        <div class="column is-narrow">
                            <div class="itgBlock-ItgNoticesCommunications__tab-selector <?php echo ($currentYear == $tabLabel ? 'is-active' : ' '); ?>" data-commSelector="<?php echo $tabLabel ?>">
                                <?php echo $tabLabel ?>
                            </div>                            
                        </div>
                    <?php endforeach; ?>
                </div>                           
            </div>
        </div>
        <div class="column is-centered is-vcentereds">
            <div class="column is-10 is-offset-2">
                <?php while( have_rows('notices_and_communications') ) : the_row(); 
                    $notices_and_communications_title = get_sub_field("notices_and_communications_title");
                    $notices_and_communications_date = get_sub_field("notices_and_communications__date"); 
                                       
                    /* extract year*/
                    list($day, $month, $year) = explode("/", $notices_and_communications_date);
                    $notices_and_communications_timestamp = strtotime($year . "-" . $month . "-" . $day);
                    $notices_and_communications_year = date("Y", $notices_and_communications_timestamp);
                    setlocale(LC_TIME, "it_IT.UTF-8");
                ?>
                    <div class="itgBlock-ItgNoticesCommunications__block <?php echo ($currentYear != $tabLabel ? '' : 'hidden '); ?> itg-mt-24" 
                                data-commYear="<?php echo $notices_and_communications_year ?>">
                        <div class="itgBlock-ItgNoticesCommunications__block--title p2">
                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo strftime('%e %B %G', $notices_and_communications_timestamp); ?></time> 
                        </div>
                        <div class="itgBlock-ItgNoticesCommunications__block--list"> 
                            <div class="columns is-multiline">
                                <?php while( have_rows('notices_and_communications_items') ) : the_row(); 
                                    $notices_and_communications_item_label = get_sub_field("notices_and_communications_items_label");
                                    $notices_and_communications_item_download_file = get_sub_field("notices_and_communications_download_file");
                                    $target = "_blank";

                                    /* get file data */
                                    $ntecommfilesize = $notices_and_communications_item_download_file['filesize'];
                                    $notecomm_filesize = size_format($ntecommfilesize, 2);
                                    $notices_and_communications_name = $notices_and_communications_item_download_file['title'];
                                    $filetype = $notices_and_communications_item_download_file['subtype'];
                                    $notices_and_communications_url = $notices_and_communications_item_download_file['url'];                                    
                                   
                                ?>
                                <div class="column is-6-desktop is-12-tablet ">
                                    <div class="itgBlock-ItgNoticesCommunications__block__file itg-mb-24">
                                        <a href="<?php echo $notices_and_communications_url; ?>" target="<?= $target; ?>">
                                            <div class="itgBlock-ItgNoticesCommunications__block__file-icon-container">
                                                <div class="itgBlock-ItgNoticesCommunications__block__file-icon-image <?php echo $notices_and_communications_item_typology; ?>"></div>
                                            </div>
                                        </a>
                                        <a href="<?php echo $notices_and_communications_url; ?>" target="<?= $target; ?>">
                                            <div class="itgBlock-ItgNoticesCommunications__block__file-title itg-pl-32 ">                                                
                                                    <div class="itgBlock-ItgNoticesCommunications__block__file-title-label p2 ">   
                                                     <span class="itgBlock-ItgNoticesCommunications__block__file-title-name">
                                                     <?php if ($notices_and_communications_title) { ?>
                                                     <?php echo $notices_and_communications_title; ?>
                                                     <?php } else { ?>
                                                     <?php echo $notices_and_communications_name; ?>
                                                     <?php } ?>
                                                     
                                                      </span>                                                    
                                                      <small><?php _e('File'); ?>: <?php echo $filetype; ?> <?php echo $notecomm_filesize; ?> </small>
                                                      
                                                      
                                                    </div>
                                            </div>
                                        </a>
                                    </div>
                                </div> 
                                <?php endwhile; ?>
                            </div>                                    
                        </div>                
                    </div>              
                    <?php endwhile; ?>              
                </div>
            </div>
        </div>
    </div>
  </div>
</div>