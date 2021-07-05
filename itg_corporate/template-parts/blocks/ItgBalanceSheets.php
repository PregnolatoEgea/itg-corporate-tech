
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-ItgBalanceSheets <?php echo $enviroment; ?> itg--background-color-blue-1">
<?php 

$balance_sheet_block_title = get_sub_field("balance_sheets_title");
$balance_sheet_block_subtitle = get_sub_field("balance_sheets_subtitle");


$tabLabels = [];
$has_stock_exchange_data = false;


if( have_rows('balance_sheets') ):

    while( have_rows('balance_sheets') ) : the_row();
        $balance_sheet_title = get_sub_field("balance_sheet_title");
        $balance_sheet_date = get_sub_field("balance_sheet_date");

        if($balance_sheet_date){
            /* extract year */
            list($day, $month, $year) = explode("/", $balance_sheet_date);
            $balance_sheet_timestamp = strtotime($year . "-" . $month . "-" . $day);
            $tabLabels[] = date("Y", $balance_sheet_timestamp);
        }
        
        /* check if there is one stock exchange*/ 
        $balance_sheet_stock_exchange_listing = get_sub_field("balance_sheet_stock_exchange_listing");
        if($balance_sheet_stock_exchange_listing == true){
            $has_stock_exchange_data = true;
        }
        
        if( have_rows('balance_sheet_items') ):
            while( have_rows('balance_sheet_items') ) : the_row();

                $balance_sheet_item_typology = get_sub_field("balance_sheet_items_typology");
                $balance_sheet_item_label = get_sub_field("balance_sheet_items_label");
                $balance_sheet_item_external_link = get_sub_field("balance_sheet_external_link");
                $balance_sheet_item_download_file = get_sub_field("balance_sheet_download_file");
                
                
                /*print("<pre>".print_r($balance_sheet_item_typology)."</pre>");
                print("<pre>".print_r($balance_sheet_item_label)."</pre>");    
                print("<pre>".print_r($balance_sheet_item_external_link)."</pre>");    
                print("<pre>".print_r($balance_sheet_item_download_file)."</pre>");    */
            endwhile;
        endif;
    endwhile;
endif;

/* clean and sort ta array */
$tabLabels = array_unique($tabLabels);
rsort($tabLabels);

?>
  <div class="container" >
    <div class="columns is-centered">
      <div class="column itgBlock-ItgBalanceSheets__container is-12">
        <div class="columns is-centered is-mobile is-multiline is-vcentered">
            <div class="column is-12">
                <div class="h3 itgBlock-ItgBalanceSheets__title itg--color-white itg-mt-48">
                    <h3>
                        <?php echo $balance_sheet_block_title ?>
                    </h3>
                </div>
            </div>
            <div class="column is-10">
                <div class="p3 itgBlock-ItgBalanceSheets__subtitle itg--color-white itg-mt-24">
                    <?php echo $balance_sheet_block_subtitle ?>
                </div>
            </div>
        </div>
        <div class="columns is-centered is-mobile is-vcentered">
            <div class="column itgBlock-ItgBalanceSheets__tab-list">
                <div class="columns is-marginless is-mobile is-vcentered">
                    <?php foreach ($tabLabels as $index => $tabLabel):  ?>
                        <div class="column is-narrow">
                            <div class="itgBlock-ItgBalanceSheets__tab-selector <?php if($index == 0){ echo 'is-active' ;} ?>" data-balanceSelector="<?php echo $tabLabel ?>">
                                <?php echo $tabLabel ?>
                            </div>                            
                        </div>
                    <?php endforeach; ?>
                    <?php if($has_stock_exchange_data): ?>
                        <div class="column is-narrow">
                            <div class="itgBlock-ItgBalanceSheets__tab-selector itg-px-48 " data-balanceSelector="STOCK">
                                <?php echo _e('Quotazione in borsa'); ?>
                            </div>                            
                        </div>
                    <?php endif; ?>
                </div>                           
            </div>
        </div>
        <div class="columns is-marginless">
            <div class="column">
                <?php while( have_rows('balance_sheets') ) : the_row(); 
                    $balance_sheet_title = get_sub_field("balance_sheet_title");
                    $balance_sheet_date = get_sub_field("balance_sheet_date");
                    $balance_sheet_stock_exchange_listing = get_sub_field("balance_sheet_stock_exchange_listing");
                    /* extract year*/
                    list($day, $month, $year) = explode("/", $balance_sheet_date);
                    $balance_sheet_timestamp = strtotime($year . "-" . $month . "-" . $day);
                    $balance_sheet_year = date("Y", $balance_sheet_timestamp);

                    $first_balance_year = $tabLabels[0];
                ?>
                    <div class="itgBlock-ItgBalanceSheets__block itg-mb-24  <?php if($balance_sheet_year != $first_balance_year){ echo 'hidden' ;} ?>" 
                                data-balanceYear="<?php echo $balance_sheet_year ?>" 
                                data-balanceStockExchange="<?php echo $balance_sheet_stock_exchange_listing ?>">
                        <div class="itgBlock-ItgBalanceSheets__block--title p2">
                            <?php echo $balance_sheet_title ?>
                        </div>
                        <div class="itgBlock-ItgBalanceSheets__block--list"> 
                            <div class="columns is-multiline">
                                <?php while( have_rows('balance_sheet_items') ) : the_row(); 
                                    $balance_sheet_item_typology = get_sub_field("balance_sheet_items_typology");
                                    $balance_sheet_item_label = get_sub_field("balance_sheet_items_label");
                                    $balance_sheet_item_external_link = get_sub_field("balance_sheet_external_link");
                                    $balance_sheet_item_download_file = get_sub_field("balance_sheet_download_file");
                                    $target = "_self";

                                    /* get file data */
                                    $balance_sheet_url = null;
                                    if($balance_sheet_item_download_file ){                                        
                                        $balance_sheet_url = wp_get_attachment_url($balance_sheet_item_download_file['ID']);
                                    }
                                    if($balance_sheet_item_external_link ){                                        
                                        $balance_sheet_url = $balance_sheet_item_external_link['url'];
                                        $target = $balance_sheet_item_external_link['target'];
                                    }

                                ?>
                                <div class="column is-6 is-12-touch ">
                                    <div class="itgBlock-ItgBalanceSheets__block__file itg-mb-24">
                                        <a href="<?php echo $balance_sheet_url; ?>" target="<?= $target; ?>">
                                            <div class="itgBlock-ItgBalanceSheets__block__file-icon-container">
                                                <div class="itgBlock-ItgBalanceSheets__block__file-icon-image <?php echo $balance_sheet_item_typology; ?>"></div>
                                            </div>
                                        </a>
                                        <a href="<?php echo $balance_sheet_url; ?>" target="<?= $target; ?>">
                                            <div class="itgBlock-ItgBalanceSheets__block__file-title itg-pl-32 ">                                                
                                                    <div class="itgBlock-ItgBalanceSheets__block__file-title-label p2 ">
                                                        <?php echo $balance_sheet_item_label; ?> <br>
                                                        <?php echo $balance_sheet_item_typology ; ?>
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