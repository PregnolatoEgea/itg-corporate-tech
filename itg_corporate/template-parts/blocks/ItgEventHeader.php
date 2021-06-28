<?php
  $event_title = get_the_title();
  $event_content = get_the_content();
  $heading_style = "h4";
  $event_icon = get_field("event_icon_event_icon");
  $is_event_online = get_field("event_online");
  $event_link = get_field("event_external_subscribe_url");

  $is_event_in_program = true;
  $is_event_past = false;

  setlocale(LC_ALL, 'it_IT');
  
  $event_start_date = get_field("event_start_date");
  $event_start_date_ts = strtotime(str_replace('/', '-', $event_start_date));
  $event_start_date_string = ucwords(strftime('%e %B %Y',$event_start_date_ts));
  
  $event_end_date = get_field("event_end_date");
  $event_end_date_ts = strtotime(str_replace('/', '-', $event_end_date));
  $event_end_date_string = ucwords(strftime('%e %B %Y',$event_end_date_ts));

  $now = time();

  if($now > $event_start_date_ts ){
    $is_event_in_program = false;
  }
  if($now > $event_end_date_ts ){
    $is_event_past = true;
    $is_event_in_program = false;
  }

?>
<section class="section">
  <div class="container itgBlock--ItgEventHeader itg-mt-8 <?php if($is_event_past){ echo 'expired' ;} ?>">
    <div class="columns is-variable is-12-desktop is-multiline">
      <div class="column itgBlock--ItgEventHeader-container">
        <div class="columns is-multiline is-centered">

          <div class="column is-10   itg-mt-48 itg-mb-48 has-text-centered">
            <?php
              if(get_field("stampare_breadcrumbs")) {
                $breadcrumbs_color = get_field("colore_breadcrumbs") == "nero" ? "#000" : "#fff";
                
                if ( function_exists('yoast_breadcrumb') ) {
                  yoast_breadcrumb( '<p id="breadcrumbs" style="color: '.$breadcrumbs_color.'">','</p>' );
                }
              }
            ?>
            
            <?php
              if($event_icon):
            ?>
              <div class="itgBlock--ItgEventHeader--icon-container">
                  <div class="itgBlock--ItgEventHeader--icon-image <?php echo $event_icon; ?>"></div>                                            
              </div>
              <div class="itgBlock--ItgEventHeader--labels-container">
                  <div class="itgBlock--ItgEventHeader--labels-list p2">
                    <?php if($is_event_online): ?>
                        <span class="itgBlock--ItgEventHeader--labels-online"> ONLINE - </span> 
                    <?php endif; ?>
                    <?php if($is_event_in_program){
                              echo _e("In programma");
                          } elseif($is_event_past){
                              echo _e("Evento concluso");
                          } else {
                            echo _e("Evento in corso");
                        }
                    ?>
                  </div>                                            
              </div>
            <?php
              endif;
            ?>

            <div class="<?php echo $heading_style ?>">
              <<?php echo $heading_style ?>>
                <?php echo $event_title ?>
              </<?php echo $heading_style ?>>  
            </div>
            <?php if(!$is_event_past): ?>
              <?php if($event_start_date_string == $event_end_date_string): ?>
                <div class="p2 has-text-weight-bold">
                  <?php echo $event_start_date_string ?>                
                </div>
              <?php endif; ?>
              <?php if($event_start_date_string != $event_end_date_string): ?>
                <div class="p2 has-text-weight-bold">
                  <?php echo $event_start_date_string ?> - <?php echo $event_end_date_string ?>               
                </div>
              <?php endif; ?>
            <?php endif; ?>

            <?php if(!$is_event_past && $event_link): ?>
              <div class="itgBlock--ItgEventHeader--cta">
                  <a href="<?php echo $event_link ?>"
                  class="column itgBlock--ItgEventHeader--cta-button p1 itg-px-32 itg-py-16"
                >
                  <span><?php echo _e("Iscriviti All'evento") ?>  </span>
                </a>
              </div>
            <?php endif; ?>

            <?php if($is_event_past && $event_link): ?>
              <div class="itgBlock--ItgEventHeader--cta expired">
                  <a 
                  class="column itgBlock--ItgEventHeader--cta-button p1 itg-px-32 itg-py-16"
                >
                  <span><?php echo _e("Evento concluso") ?>  </span>
                </a>
              </div>
            <?php endif; ?>

          </div>
        </div>
    </div>
    </div>
  </div>
  
  <div class="container itgBlock--ItgEventHeader--Social pt-8">
    <div class="columns is-variable is-12">
      <div class="column itgBlock--ItgEventHeader--Social-container">
        <div class="columns is-centered is-mobile is-vcentered itg-mt-8">
          <?php 

              $current_url = esc_url( get_permalink() );

              $twitter_url = "https://twitter.com/intent/tweet?url=".$current_url;
              $linkedn_url = "https://www.linkedin.com/sharing/share-offsite/?url=".$current_url;

              $linkedn_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/events/share_linkedin.svg';
              $twitter_icon = get_template_directory_uri(  ) . '/dist/src/images/icons/events/share_twitter.svg';          
          
          ?>
          <div class="column is-narrow">
            <a target="_blank" href="<?php echo $twitter_url ?>" class="itgBlock--ItgEventHeader--Social--icon">
              <img class="" src="<?php echo $twitter_icon ?>" alt="Twitter Social Icon">
            </a>
          </div>           
          <div class="column is-narrow">
            <a target="_blank" href="<?php echo $linkedn_url ?>" class="itgBlock--ItgEventHeader--Social--icon">
              <img class="" src="<?php echo $linkedn_icon ?>" alt="Linkedn Social Icon">
            </a>
          </div>           
        </div>
      </div>
    </div>
  </div>
  
  <div class="container itgBlock--ItgEventHeader--Description">
    <div class="columns is-variable is-12-desktop is-multiline">
      <div class="column itgBlock--ItgEventHeader--Description-container itg-py-48">
        <div class="columns is-multiline is-centered">
            <div class="column is-10">
                <div class="p4 has-text-centered">
                  <?php echo $event_content ?>
                </div>  
            </div>                    
        </div>
      </div>
    </div>
</section>