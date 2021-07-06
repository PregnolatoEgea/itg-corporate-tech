<?php

$show_past_future_filter = get_sub_field("event_list_show_past_future_filter");
$show_categories_filter = get_sub_field("event_list_show_categories_filter");
$show_years_filter = get_sub_field("event_list_show_years_filter");

$currentYear = date("Y");
$yearOptions = [];
$yearOptions[] = $currentYear;
for ($i = 1; $i <= 5; $i++) {
  $yearOptions[] = $currentYear - $i;
}

$eventList = [];
$futureEventList = [];
$pastEventList = [];

if (have_rows('event_list_events')) :
  while (have_rows('event_list_events')) : the_row();
    $eventObj = [];
    $internalEvent = get_sub_field("event_list_event");
    if ($internalEvent) {
      //event is internal
      $eventObj["type"] = "INT";
      $eventObj["title"] = $internalEvent->post_title;
      $eventObj["text"] =  $internalEvent->post_content;
      $eventMeta = get_post_meta($internalEvent->ID);
      $eventObj["event_icon"] = get_post_meta($internalEvent->ID, 'event_icon_event_icon', true);
      $eventObj["event_category"] = get_post_meta($internalEvent->ID, 'event_category_event_category', true);
      $eventObj["is_event_online"] = get_post_meta($internalEvent->ID, 'event_online', true);
      $eventObj["event_link"] = get_permalink($internalEvent->ID);
      $eventObj["event_link_target"] = "_self";

      $event_start_date = get_post_meta($internalEvent->ID, 'event_start_date', true);
      $event_start_date_ts = strtotime(str_replace('/', '-', $event_start_date));

      $day = strftime('%e', $event_start_date_ts);
      $month = strtolower(__(strftime('%B', $event_start_date_ts)));
      $year = strftime('%Y', $event_start_date_ts);
      $event_start_date_string = $day . ' ' . $month . ' ' . $year;

      $event_start_time_string = ucwords(strftime('%H:%M', $event_start_date_ts));

      $event_end_date =  get_post_meta($internalEvent->ID, 'event_end_date', true);
      $event_end_date_ts = strtotime(str_replace('/', '-', $event_end_date));

      $day = strftime('%e', $event_end_date_ts);
      $month = strtolower(__(strftime('%B', $event_end_date_ts)));
      $year = strftime('%Y', $event_end_date_ts);
      $event_end_date_string = $day . ' ' . $month . ' ' . $year;

      $event_end_time_string = ucwords(strftime('%H:%M', $event_end_date_ts));

      $eventObj["event_start_date"] = $event_start_date;
      $eventObj["event_start_date_ts"] = $event_start_date_ts;
      $eventObj["event_start_date_string"] = $event_start_date_string;
      $eventObj["event_start_time_string"] = $event_start_time_string;
      $eventObj["event_end_date"] = $event_end_date;
      $eventObj["event_end_date_ts"] = $event_end_date_ts;
      $eventObj["event_end_date_string"] = $event_end_date_string;
      $eventObj["event_end_time_string"] = $event_end_time_string;
      $eventObj["event_year"] = $event_year;

      $now = time();
      $eventObj["is_event_in_program"] = true;
      $eventObj["is_event_past"] = false;

      if ($now > $event_start_date_ts) {
        $eventObj["is_event_in_program"] = false;
      }
      if ($now > $event_end_date_ts) {
        $eventObj["is_event_past"] = true;
        $eventObj["is_event_in_program"] = false;
      }
    } else {
      //event is external
      $eventObj["type"] = "EXT";
      $eventObj["title"] = get_sub_field("event_list_title");
      $eventObj["text"] =  get_sub_field("event_list_text");
      $eventObj["event_icon"] = get_sub_field("event_list_icon_event_icon");
      $eventObj["event_category"] = get_sub_field("event_list_category_event_category");
      $eventObj["is_event_online"] = get_sub_field("event_list_online");
      $eventObj["event_link"] = get_sub_field("event_list_subscribe_url");
      $eventObj["event_link_target"] = "_blank";

      $event_start_date = get_sub_field("event_list_start_date");
      $event_start_date_ts = strtotime(str_replace('/', '-', $event_start_date));

      $day = strftime('%e', $event_start_date_ts);
      $month = strtolower(__(strftime('%B', $event_start_date_ts)));
      $year = strftime('%Y', $event_start_date_ts);
      $event_start_date_string = $day . ' ' . $month . ' ' . $year;

      $event_start_time_string = ucwords(strftime('%H:%M', $event_start_date_ts));
      $event_year = strftime('%Y', $event_start_date_ts);

      $event_end_date = get_sub_field("event_list_end_date");
      $event_end_date_ts = strtotime(str_replace('/', '-', $event_end_date));

      $day = strftime('%e', $event_end_date_ts);
      $month = strtolower(__(strftime('%B', $event_end_date_ts)));
      $year = strftime('%Y', $event_end_date_ts);
      $event_end_date_string = $day . ' ' . $month . ' ' . $year;

      $event_end_time_string = ucwords(strftime('%H:%M', $event_end_date_ts));
      $eventObj["event_start_date"] = $event_start_date;
      $eventObj["event_start_date_ts"] = $event_start_date_ts;
      $eventObj["event_start_date_string"] = $event_start_date_string;
      $eventObj["event_start_time_string"] = $event_start_time_string;
      $eventObj["event_end_date"] = $event_end_date;
      $eventObj["event_end_date_ts"] = $event_end_date_ts;
      $eventObj["event_end_date_string"] = $event_end_date_string;
      $eventObj["event_end_time_string"] = $event_end_time_string;
      $eventObj["event_year"] = $event_year;

      $now = time();
      $eventObj["is_event_in_program"] = true;
      $eventObj["is_event_past"] = false;
      if ($now > $event_start_date_ts) {
        $eventObj["is_event_in_program"] = false;
      }
      if ($now > $event_end_date_ts) {
        $eventObj["is_event_past"] = true;
        $eventObj["is_event_in_program"] = false;
      }
    }


    //outlook
    $outlookUrl = 'https://outlook.live.com/calendar/deeplink/compose?path=/calendar/action/compose&rru=addevent';
    $dateStart = new DateTime();
    $dateStart->setTimestamp($eventObj["event_start_date_ts"]);
    $dateStart->setTimezone(new DateTimeZone('UTC'));
    $dateEnd = new DateTime();
    $dateEnd->setTimestamp($eventObj["event_end_date_ts"]);
    $dateEnd->setTimezone(new DateTimeZone('UTC'));

    $outlookUrl .= '&startdt=' . $dateStart->format('Y-m-d\TH:i:s');
    $outlookUrl .= '&enddt=' . $dateEnd->format('Y-m-d\TH:i:s');
    $outlookUrl .= '&subject=' . urlencode($eventObj["title"]);
    $eventObj["outlook_url"] = $outlookUrl;;

    //gcalendar

    $gCalendarUrl = 'https://calendar.google.com/calendar/render?action=TEMPLATE';
    $gCalendarUrl .= '&text=' . urlencode($eventObj["title"]);
    $gCalendarUrl .= '&dates=' . $dateStart->format('Ymd\THis') . '/' . $dateEnd->format('Ymd\THis');
    $eventObj["google_url"] = $gCalendarUrl;;

    if ($eventObj["is_event_past"]) {
      $pastEventList[] = $eventObj;
    } else {
      $futureEventList[] = $eventObj;
    }
  endwhile;
endif;

if (count($futureEventList) > 0) {
  usort($futureEventList, function ($a, $b) {
    return $a['event_start_date_ts'] - $b['event_start_date_ts'];
  });
}
if (count($pastEventList) > 0) {
  usort($pastEventList, function ($a, $b) {
    return $b['event_start_date_ts'] - $a['event_start_date_ts'];
  });
}
$eventList = array_merge($futureEventList, $pastEventList);

$subscribe_icon = get_template_directory_uri() . '/dist/src/images/icons/events/rapid_link.svg';


?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-ItgEventList <?php echo $enviroment; ?> itg--background-color-blue-1">
  <div class="container">
    <div class="columns is-centered is-multiline is-marginless">
      <div class="column itgBlock-ItgEventList__container is-12 itgBlock-ItgEventList__tab-list <?php if (!$show_past_future_filter) {
                                                                                                  echo 'hidden';
                                                                                                } ?>">
        <div class="columns is-marginless is-mobile is-vcentered first">
          <div class="column is-narrow">
            <div class="itgBlock-ItgEventList__tab-selector itgBlock-ItgEventList__tab-selector-time  " data-eventtimeselector="future">
              <?php echo _e('Futuri'); ?>
            </div>
          </div>
          <div class="column is-narrow">
            <div class="itgBlock-ItgEventList__tab-selector itgBlock-ItgEventList__tab-selector-time  " data-eventtimeselector="past">
              <?php echo _e('Passati'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="column itgBlock-ItgEventList__container is-12 itgBlock-ItgEventList__tab-list <?php if (!$show_categories_filter && !$show_years_filter) {
                                                                                                  echo 'hidden';
                                                                                                } ?>">
        <div class="columns is-marginless is-mobile is-vcentered itgBlock-ItgEventList__tab-list-multiline-mobile-only  ">
          <div class="itgBlock-ItgEventList__tab-list-mobile-only-wrapper <?php if (!$show_categories_filter) {
                                                                            echo 'hidden';
                                                                          } ?>">
            <div class="column is-narrow-desktop is-narrow-widescreen is-narrow-fullhd is-3-tablet is-narrow-mobile">
              <div class="itgBlock-ItgEventList__tab-selector itgBlock-ItgEventList__tab-selector-category  " data-eventcategoryselector="finance">
                <?php echo _e('Finance'); ?>
              </div>
            </div>
            <div class="column is-narrow-desktop is-narrow-widescreen is-narrow-fullhd is-3-tablet is-narrow-mobile">
              <div class="itgBlock-ItgEventList__tab-selector itgBlock-ItgEventList__tab-selector-category  " data-eventcategoryselector="corporate">
                <?php echo _e('Corporate'); ?>
              </div>
            </div>
            <div class="column is-narrow-desktop is-narrow-widescreen is-narrow-fullhd is-3-tablet is-narrow-mobile">
              <div class="itgBlock-ItgEventList__tab-selector itgBlock-ItgEventList__tab-selector-category   " data-eventcategoryselector="career">
                <?php echo _e('Career'); ?>
              </div>
            </div>
            <div class="column is-narrow-desktop is-narrow-widescreen is-narrow-fullhd is-3-touch is-narrow-mobile">
              <div class="itgBlock-ItgEventList__tab-selector itgBlock-ItgEventList__tab-selector-category " data-eventcategoryselector="sustainability">
                <?php echo _e('Sostenibilità'); ?>
              </div>
            </div>
          </div>
          <div class="column is-hidden-touch"></div>
          <div class="column is-narrow-desktop is-narrow-widescreen is-narrow-fullhd is-12-touch itgBlock-ItgEventList__tab-list-center-flex">
            <div class="itgBlock-ItgEventList__tab-select <?php if (!$show_years_filter) {
                                                            echo 'hidden';
                                                          } ?>">
              <select class="itgBlock-ItgEventList__tab-select-element">
                <?php foreach ($yearOptions as $year) :  ?>
                  <option><?php echo $year; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="column is-12 ">
        <div class="columns is-marginless is-mobile is-vcentered is-multiline">
          <?php foreach ($eventList as $eventListkey => $eventObj) : ?>
            <div id="event-card-<?php echo $eventListkey ?>" class="column is-12 itg-mb-48 itgBlock-ItgEventList__block <?php if (($eventObj["event_year"] != $currentYear) && $show_years_filter) {
                                                                                                                          echo 'hidden';
                                                                                                                        } ?>" data-eventyear="<?php echo $eventObj["event_year"] ?>" data-eventtime="<?php if ($eventObj["is_event_past"]) {
                                                                                                                                                                                                                                                                                                  echo 'past';
                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                  echo "future";
                                                                                                                                                                                                                                                                                                } ?>" data-eventcategory="<?php echo $eventObj["event_category"] ?>">

              <!-- START DESKTOP card -->
              <div class="columns is-mobile itgBlock-ItgEventList__event--card is-hidden-touch">

                <div class="column is-2 itgBlock-ItgEventList__event--card--left-panel is-centered is-vcentered <?php if ($eventObj["is_event_past"]) {
                                                                                                                  echo 'expired';
                                                                                                                } ?>">
                  <div class="itgBlock-ItgEventList--icon-container">
                    <div class="itgBlock-ItgEventList--icon-image <?php echo $eventObj["event_icon"] ?> <?php if ($eventObj["is_event_past"]) {
                                                                                                          echo 'expired';
                                                                                                        } ?>"></div>
                  </div>
                  <div class="itgBlock-ItgEventList--left-labels-container">
                    <div class="itgBlock-ItgEventList--left-labels-list p1">
                      <div class="itgBlock-ItgEventList--left-labels-category is-uppercase <?php if ($eventObj["is_event_past"]) {
                                                                                              echo 'expired';
                                                                                            } ?>"> <?php echo _e($eventObj["event_category"]) ?> </div>
                    </div>
                  </div>
                </div>

                <div class="column is-7 itgBlock-ItgEventList--center-panel">
                  <div class="itgBlock-ItgEventList--center-labels-container">
                    <div class="itgBlock-ItgEventList--center-labels-list p2">

                      <?php if ($eventObj["is_event_online"]) : ?>
                        <span class="itgBlock--ItgEventHeader--labels-online"> ONLINE - </span>
                      <?php endif; ?>
                      <?php if ($eventObj["is_event_in_program"]) {
                        echo _e("In programma");
                      } elseif ($eventObj["is_event_past"]) {
                        echo _e("Evento concluso");
                      } else {
                        echo _e("Evento in corso");
                      }
                      ?>

                    </div>
                  </div>
                  <div class="itgBlock-ItgEventList--center-title">
                    <h5 class="h5 ">
                      <?php echo $eventObj["title"] ?>
                    </h5>
                  </div>
                  <div class="itgBlock-ItgEventList--center-text itgBlock-ItgEventList--only-expanded ">
                    <div class="p2">
                      <?php echo _e($eventObj["text"]) ?>
                    </div>
                  </div>
                  <?php if ($eventObj["event_link"]) : ?>
                    <div class="itgBlock-ItgEventList--center-cta itg-mt-24 itgBlock-ItgEventList--only-expanded">
                      <a href="<?php echo $eventObj["event_link"] ?>" target="<?php echo $eventObj["event_link_target"] ?>">
                        <div class="p2 has-text-weight-bold" style="display:inline-block;width: 200px;">
                          <span><?php echo _e("Iscriviti all’evento") ?> </span> <img src="<?php echo $subscribe_icon; ?>" alt="Link Icon" class="" style="float: right;">
                        </div>
                      </a>
                    </div>
                  <?php endif; ?>
                  <div class="itgBlock-ItgEventList--center-bottom">
                    <div class="itgBlock-ItgEventList--center-bottom-arrow-container" data-cardkey="<?php echo $eventListkey ?>">
                      <div class="arrow down" data-cardkey="<?php echo $eventListkey ?>"></div>
                    </div>
                  </div>
                </div>

                <div class="column is-3 itgBlock-ItgEventList__event--card--right-panel" style="padding-top:0px">
                  <div class="itgBlock-ItgEventList--right-container">
                    <div class="itgBlock-ItgEventList--right-container-dates">
                      <div class="itgBlock-ItgEventList--right-date p3 is-uppercase">
                        <?php if ($eventObj["event_start_date_string"] == $eventObj["event_end_date_string"]) : ?>
                          <?php echo $eventObj["event_start_date_string"] ?>
                        <?php endif; ?>
                        <?php if ($eventObj["event_start_date_string"] != $eventObj["event_end_date_string"]) : ?>
                          <?php echo $eventObj["event_start_date_string"] ?>
                        <?php endif; ?>
                      </div>
                      <div class="itgBlock-ItgEventList--right-hour p2">
                        <?php if ($eventObj["event_start_date_string"] == $eventObj["event_end_date_string"]) : ?>
                          <!-- SAME DAY -->
                          <?php if (($eventObj["event_start_time_string"] != '00:00') || ($eventObj["event_end_time_string"] != '00:00')) : ?>
                            <?php if ($eventObj["event_start_time_string"] == $eventObj["event_end_time_string"]) : ?>
                              <?php echo $eventObj["event_start_time_string"] ?>
                            <?php endif; ?>
                            <?php if ($eventObj["event_start_time_string"] != $eventObj["event_end_time_string"]) : ?>
                              <?php echo $eventObj["event_start_time_string"] ?>-<?php echo $eventObj["event_end_time_string"] ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($eventObj["event_start_date_string"] != $eventObj["event_end_date_string"]) : ?>
                          <!-- DIFFERENT DAY -->
                          <?php if (($eventObj["event_start_time_string"] != '00:00') && ($eventObj["event_end_time_string"] != '00:00')) : ?>
                            <?php echo $eventObj["event_start_time_string"] ?>-<?php echo $eventObj["event_end_time_string"] ?>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="itgBlock-ItgEventList--right-container-events itg-mt-24 itgBlock-ItgEventList--only-expanded">
                      <div class="itgBlock-ItgEventList--right-events-add p2">
                        <?php echo _e("Aggiungi evento al calendario") ?>
                      </div>
                      <div class="itgBlock-ItgEventList--right-events-button itg-mt-24">
                        <a href="<?php echo $eventObj["google_url"] ?>" target="_blank">
                          <button class="button">
                            <span class="icon itgBlock-ItgEventList--right-events-button-icon gmail">
                            </span>
                            <span>Gmail</span>
                          </button>
                        </a>
                      </div>
                      <div class="itgBlock-ItgEventList--right-events-button itg-mt-24">
                        <a href="<?php echo $eventObj["outlook_url"] ?>" target="_blank">
                          <button class="button">
                            <span class="icon itgBlock-ItgEventList--right-events-button-icon outlook">
                            </span>
                            <span>Outlook</span>
                          </button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END DESKTOP card -->

              <!-- START TOUCH card -->
              <div class="columns is-mobile is-multiline itgBlock-ItgEventList__event--card is-hidden-desktop">

                <div class="column is-12 itgBlock-ItgEventList__event--card--left-panel <?php if ($eventObj["is_event_past"]) {
                                                                                          echo 'expired';
                                                                                        } ?>">
                  <div class="itgBlock-ItgEventList--icon-container">
                    <div class="itgBlock-ItgEventList--icon-image <?php echo $eventObj["event_icon"] ?> <?php if ($eventObj["is_event_past"]) {
                                                                                                          echo 'expired';
                                                                                                        } ?>" style="float: left;"></div>
                    <div class="itgBlock-ItgEventList--left-labels-list" style="line-height: 50px !important;float: left;">
                      <div class="itgBlock-ItgEventList--left-labels-category is-uppercase <?php if ($eventObj["is_event_past"]) {
                                                                                              echo 'expired';
                                                                                            } ?>"> <?php echo _e($eventObj["event_category"]) ?> </div>
                    </div>
                  </div>
                </div>

                <div class="column is-12 itgBlock-ItgEventList--center-panel">
                  <div class="itgBlock-ItgEventList--center-labels-container">
                    <div class="itgBlock-ItgEventList--center-labels-list p2">

                      <?php if ($eventObj["is_event_online"]) : ?>
                        <span class="itgBlock--ItgEventHeader--labels-online"> ONLINE - </span>
                      <?php endif; ?>
                      <?php if ($eventObj["is_event_in_program"]) {
                        echo _e("In programma");
                      } elseif ($eventObj["is_event_past"]) {
                        echo _e("Evento concluso");
                      } else {
                        echo _e("Evento in corso");
                      }
                      ?>

                    </div>
                  </div>
                  <div class="itgBlock-ItgEventList--center-title">
                    <h6 class="h6">
                      <?php echo $eventObj["title"] ?>
                    </h6>
                  </div>
                  <div class="itgBlock-ItgEventList--center-text itgBlock-ItgEventList--only-expanded ">
                    <div class="p2">
                      <?php echo _e($eventObj["text"]) ?>
                    </div>
                  </div>
                  <?php if ($eventObj["event_link"]) : ?>
                    <div class="itgBlock-ItgEventList--center-cta itg-mt-24 itgBlock-ItgEventList--only-expanded">
                      <a href="<?php echo $eventObj["event_link"] ?>" target="<?php echo $eventObj["event_link_target"] ?>">
                        <div class="p2 has-text-weight-bold" style="display:inline-block;width: 200px;">
                          <span><?php echo _e("Iscriviti all’evento") ?> </span> <img src="<?php echo $subscribe_icon; ?>" alt="Link Icon" class="" style="float: right;">
                        </div>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>

                <div class="column is-12 itgBlock-ItgEventList__event--card--right-panel">
                  <div class="itgBlock-ItgEventList--right-touch-container">
                    <div class="itgBlock-ItgEventList--right-container-dates">
                      <div class="itgBlock-ItgEventList--right-date p2 is-uppercase">
                        <?php if ($eventObj["event_start_date_string"] == $eventObj["event_end_date_string"]) : ?>
                          <?php echo $eventObj["event_start_date_string"] ?>
                        <?php endif; ?>
                        <?php if ($eventObj["event_start_date_string"] != $eventObj["event_end_date_string"]) : ?>
                          <?php echo $eventObj["event_start_date_string"] ?>
                        <?php endif; ?>
                      </div>
                      <div class="itgBlock-ItgEventList--right-hour p2">
                        <?php echo $eventObj["event_start_time_string"] ?>-<?php echo $eventObj["event_end_time_string"] ?>
                      </div>
                    </div>
                    <div class="itgBlock-ItgEventList--right-container-events itg-mt-24 itgBlock-ItgEventList--only-expanded itg-pb-24">
                      <div class="itgBlock-ItgEventList--right-events-add p2">
                        <?php echo _e("Aggiungi evento al calendario") ?>
                      </div>
                      <div class="itgBlock-ItgEventList--right-events-button itg-mt-24">
                        <a href="<?php echo $eventObj["google_url"] ?>" target="_blank">
                          <button class="button">
                            <span class="icon itgBlock-ItgEventList--right-events-button-icon gmail">
                            </span>
                            <span>Gmail</span>
                          </button>
                        </a>
                      </div>
                      <div class="itgBlock-ItgEventList--right-events-button itg-mt-24">
                        <a href="<?php echo $eventObj["outlook_url"] ?>" target="_blank">
                          <button class="button">
                            <span class="icon itgBlock-ItgEventList--right-events-button-icon outlook">
                            </span>
                            <span>Outlook</span>
                          </button>
                        </a>
                      </div>
                    </div>
                    <div class="itgBlock-ItgEventList--center-bottom">
                      <div class="itgBlock-ItgEventList--center-bottom-arrow-container" data-cardkey="<?php echo $eventListkey ?>">
                        <div class="arrow down" data-cardkey="<?php echo $eventListkey ?>"></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- END TOUCH card -->



            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>