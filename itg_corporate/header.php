<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Itg_Sustainability
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<?php
			$left_menu = wp_get_nav_menu_items('pre-header-left-side');
			$reshape_menu = pre_header_menu_reshape($left_menu);

			foreach ($reshape_menu as $key => $item) {
			?>
				<div id="Itg_PreHeaderData_<?php echo $key; ?>" class="itgPreHeader__bottomSide" data-menu-id="Itg_PreHeaderData_<?php echo $key; ?>">
					<div class="columns">
						<?php
						foreach ($item as $label => $content) {
							foreach ($content as $c => $data) {
						?>
								<div class="column">
									<ul class="Itg_PreHeaderData_submenu">
										<?php
										foreach ($data as $d => $data_info) {
											$reshape_menu_item_title = $data_info->title;
											$reshape_menu_item_url = $data_info->url;
											$reshape_menu_item_target = $data_info->target;
											$reshape_menu_item_ID = $data_info->ID;
<<<<<<< HEAD
											$reshape_label = get_field('label_submenu', $left_menu_item_ID);
=======

>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
										?>
											<?php if ($d == 0) { ?>
												<li class="itg_submenulabel"><span><?php echo $label; ?></span></li>
											<?php } ?>
											<li><a href="<?php echo $reshape_menu_item_url; ?>"><?php echo $reshape_menu_item_title; ?></a></li>
										<?php } ?>
<<<<<<< HEAD
										
										
=======
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
									</ul>
								</div>
						<?php }
						} ?>
					</div>
				</div>
			<?php } ?>
			<div class="itgPreHeader itg-px-56">
				<div class="itgPreHeader__leftSide">
					<?php
					$left_menu = wp_get_nav_menu_items('pre-header-left-side');
					if ($left_menu) : echo '<span class="itg_preheader-left_label">In evidenza&nbsp;</span>';
					endif;
					foreach ($left_menu as $key => $left_menu_item) {
						if ($left_menu_item->menu_item_parent == 0) {
							$left_menu_item_title = $left_menu_item->title;
							$left_menu_item_url = $left_menu_item->url;
							$left_menu_item_target = $left_menu_item->target;
							$left_menu_item_ID = $left_menu_item->ID;
<<<<<<< HEAD
							$left_menu_icon_image = get_field('image', $left_menu_item_ID);
					?>
							<div class="itg_a_container">
								<a id="itg_a_button_<?php echo $key; ?>" data-target="Itg_PreHeaderData_<?php echo $left_menu_item_ID; ?>" class="itgPreHeader--singleItem itg-mr-10">
									<?php
									if ($left_menu_icon_image) {
=======

					?>
							<div class="itg_a_container">
								<a id="itg_a_button_<?php echo $key; ?>" data-target="Itg_PreHeaderData_<?php echo $left_menu_item_ID; ?>" href="#" class="itgPreHeader--singleItem itg-mr-10">
									<?php
									if (get_field('image', $left_menu_item->ID)) {
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
									?>
										<img id="itg_a_image_<?php echo $key; ?>" class="itg-mr-10" src="<?php echo get_field('image', $left_menu_item_ID); ?>" alt="<?php echo $left_menu_item_title; ?>">
									<?php } ?>
									<?php echo $left_menu_item_title; ?></a>
<<<<<<< HEAD
							</div> 
=======
							</div>
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
						<?php
						}
						?>
					<?php
					}
					?>
<<<<<<< HEAD
					<div class="Itg_stock_update">
					<div id="title-perc"></div> 
					<div class="lastprice">
				<?php _e('Ultimo prezzo'); ?>
					</div>
															<div id="title-price"></div> €
															<script type="text/javascript">
																			jQuery.ajax({
																						url: "https://syndication.teleborsa.it/Italgas/Feeds/jsonValues", 
																						method: "get",		
																						success: function(result){
																				        	jQuery("#title-perc").text(result.percentChange);
																							jQuery("#title-price").text(result.lastTrade);
																						}
									    				});
										</script>
					</div>
=======
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
					<?php
					if (get_field('news', $left_menu_item->news)) {
					?>
						<a class="itgPreHeader--singleItem itg-mr-10">
							<?php echo $left_menu_item->news; ?>
						</a>
					<?php
					}
					?>
				</div>
				<div class=" itgPreHeader__rightSide">
					<?php $links_menu = wp_get_nav_menu_items('links-menu');
					if ($links_menu) :
						foreach ($links_menu as $key => $links_menu_item) {
							$links_menu_item_ID = $links_menu_item->ID;
							$links_menu_item_title = $links_menu_item->post_title;
							$links_menu_item_url = $links_menu_item->url;
							$links_menu_item_target = $links_menu_item->target;
					?>
							<?php
							if (get_field('image', $links_menu_item_ID)) {
							?>
<<<<<<< HEAD
								<a target="_blank" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
=======
								<a target="<?php echo $links_menu_item_target; ?>" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
									<img class="itg-mr-10" src="<?php echo get_field('image', $links_menu_item_ID); ?>" alt="<?php echo $links_menu_item_title; ?>">
								</a>
							<?php
							} else if (get_field('link_tipology', $links_menu_item_ID) === 'linblank') {
							?>
<<<<<<< HEAD
								<a target="_blank" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
=======
								<a target="<?php echo $links_menu_item_target; ?>" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
									<?php echo $links_menu_item_title; ?>
									<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/external_page_blue.svg" alt="<?php echo $links_menu_item_title; ?>">
								</a>
							<?php
							} else if (get_field('link_tipology', $links_menu_item_ID) === 'linkself') {
							?>
<<<<<<< HEAD
								<a href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
=======
								<a target="<?php echo $links_menu_item_target; ?>" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
									<?php echo $links_menu_item_title; ?>
									<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/internal_page_blue.svg" alt="<?php echo $links_menu_item_title; ?>">
								</a>
							<?php } else { ?>
								<p class="itgPreHeader--singleItem itg-mr-10"><?php echo $links_menu_item_title; ?></p>
							<?php } ?>
					<?php
						}
					endif;
					?>
					<?php
					$right_menu = wp_get_nav_menu_items('pre-header-right-side');


					foreach ($right_menu as $key => $right_menu_item) {
						$right_menu_item_ID = $right_menu_item->ID;
						$right_menu_item_title = $right_menu_item->post_title;
						$right_menu_item_url = $right_menu_item->url;
						$right_menu_item_target = $right_menu_item->target;

					?>
						<?php
						if (get_field('image', $right_menu_item_ID)) {
						?>
							<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
								<img class="itg-mr-10" src="<?php echo get_field('image', $right_menu_item_ID); ?>" alt="<?php echo $right_menu_item_title; ?>">
							</a>
						<?php
						} else if (get_field('link_tipology', $right_menu_item_ID) === 'linblank') {
						?>
<<<<<<< HEAD
							<a target="_blank" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
								<?php echo $right_menu_item_title; ?>
								<img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/external_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
=======
							<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
								<?php echo $right_menu_item_title; ?>
								<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/external_page_blue.svg" alt="<?php echo $right_menu_item_title; ?>">
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
							</a>
						<?php
						} else if (get_field('link_tipology', $right_menu_item_ID) === 'linkself') {
						?>
							<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
								<?php echo $right_menu_item_title; ?>
<<<<<<< HEAD
								<img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/internal_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
=======
								<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/internal_page_blue.svg" alt="<?php echo $right_menu_item_title; ?>">
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
							</a>
						<?php } else { ?>
							<p class="itgPreHeader--singleItem itg-mr-10"><?php echo $right_menu_item_title; ?></p>
						<?php
						}
						?>
					<?php
					}
					?>
					<?php
					if (get_field('language', $right_menu_item->language)) {
					?>
<<<<<<< HEAD
							<!-- Selettore Lingua WPML -->
							<?php do_action( 'wpml_add_language_selector' ); ?>
=======
						<a class="itgPreHeader--singleItem itg-mr-10">
							<!-- Selettore Lingua WPML -->
							<?php do_action('wpml_add_language_selector'); ?>
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
						<?php
					}
						?>
				</div>
			</div>
<<<<<<< HEAD
					<nav class="navbar" aria-label="main navigation">
								<div class="navbar-brand">
									<a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) );?>">
																			<img class="itgHeader--logo" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
									</a>
						
								 <button class="button navbar-burger" data-target="mega-menu" aria-controls="mega-menu" aria-haspopup="true" aria-label="Menu Button" aria-pressed="false">
									 <span aria-hidden="true"></span>
									 <span aria-hidden="true"></span>
									 <span aria-hidden="true"></span>
								 </button>
						 </div>
				
						 <div id="mega-menu" class="navbar-menu Itg-hero-menu-lower">
							 <div class="navbar-start">
								 <?php
								$main_mega_menu = wp_get_nav_menu_items('main-mega-menu');
								$itg_submenu_label = get_field('label_submenu', $left_menu_item_ID);
								
								

								foreach ($main_mega_menu as $key => $main_menu_item) {

											$main_menu_item_ID = $main_menu_item->ID;
											$main_menu_item_title = $main_menu_item->title;
											$main_menu_item_url = $main_menu_item->url;
											$main_menu_item_target = $main_menu_item->target;
											$main_menu_item_class = $main_menu_item->classes[1];
											$itg_megamenu_bgimage = get_field('background_image', $main_menu_item_ID);
											$itg_megamenu_title = get_field('title_menu', $main_menu_item_ID);
											$itg_megamenu_subtitle = get_field('subtitle_menu', $main_menu_item_ID);
											$itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);
											$itg_megamenu_cta_name = $main_menu_item->post_name;
								?>
								<div class="navbar-item has-dropdown is-mega">
										<div class="navbar-trigger navbar-link flex <?php echo $main_menu_item_class; ?>">
											<span id="itg_header_tab_span_<?php echo $main_menu_item_ID; ?>"><?php echo $main_menu_item_title; ?></span>
										</div>
									<div id="Itg-hero-menu__<?php echo $main_menu_item_ID; ?>Dropdown" class="<?php echo $main_menu_item_class; ?> navbar-dropdown is-link is-hide" style="background-image: url(' <?php echo $itg_megamenu_bgimage; ?>');" data-style="width: 18rem;">
						
														<div class="itg_bg_heromenu is-fluid">
															
															<div class="itg__rowtitle">
																<div class="Itg-hero-menu-upper columns is-flex is-vcentered is-multiline">
																		<div class="Itg-hero-menu-upper-left column is-6">
																			<span><?php echo $itg_megamenu_title; ?></span>
																			<p><?php echo $itg_megamenu_subtitle; ?></p>
																		</div>
																		<div class="Itg-hero-menu-upper-right column is-6">
								
																		<?php if ($itg_megamenu_cta_name == 'servizi') { ?>
																		<div class="columns">

																		<?php
																			// Check rows exists.
																				if( have_rows('launch_megamenu', $main_menu_item_ID) ):
																				
																				    // Loop through rows.
																				    while( have_rows('launch_megamenu', $main_menu_item_ID) ) : the_row(); 
																								$cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
																							 $cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
																								$cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>
																					<div class="column is-6">
																								<div class="Itg_mega_menu_cta">
																									<a href="<?php echo $cta_megamenu_link; ?>"><div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
																				     <p><?php echo $cta_megamenu_title; ?></p>
																				     <img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
																									</a>
																								</div>
																					</div>
																				
																				  <?php  // End loop.
																				    endwhile;
																				
																				// No value.
																				else :
																				    // Do something...
																				endif;
																				?>
																		</div>
																		<?php } else { ?>
																		<?php
																			// Check rows exists.
																				if( have_rows('launch_megamenu', $main_menu_item_ID) ):
																				
																				    // Loop through rows.
																				    while( have_rows('launch_megamenu', $main_menu_item_ID) ) : the_row(); 
																								$cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
																							 $cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
																								$cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>
																				
																								<div class="Itg_mega_menu_cta">
																									<a href="<?php echo $cta_megamenu_link; ?>"><div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
																				     <p><?php echo $cta_megamenu_title; ?></p>
																				     <img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
																									</a>
																								</div>
																								
																				
																				  <?php  // End loop.
																				    endwhile;
																				
																				// No value.
																				else :
																				    // Do something...
																				endif;
																				?>
																		
																		<?php } ?>
																											
																		</div>
																	</div>
															</div>
															
															
															<div class="itg_bg_herocolumnsmenu">
																	<div class="itg__columns-menus">
																		<div class="columns Itg-hero-menu-lower">
																			
																			<div class="column is-12 ItgLeftTabs">										
																					<div class="Itg-hero-menu-lower-left-tabs is-flex-direction-row is-justify-content-space-between is-align-items-center">
																					
																						<div class="columns">
																							
																								<div class="Itg_mega_menu_cta column is-3">
																									 <ul class="itg_navtabs">
																									<?php // Check rows exists.
																										$main_menu_item_ID = $main_menu_item->ID;
																							$main_menu_item_title = $main_menu_item->title;
																							$main_menu_item_url = $main_menu_item->url;
																							$main_menu_item_target = $main_menu_item->target;
																							$main_menu_item_class = $main_menu_item->classes[1];
																							$itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);
																							
																					if( have_rows('tabs_links', $main_menu_item_ID) ):
																					$i=0;
																					    // Loop through rows.
																					    while( have_rows('tabs_links', $main_menu_item_ID) ) : the_row(); 
																								 $cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID); 
																								 $cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID); 
																								 $cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID); 
																								 $fields = get_fields($main_menu_item_ID);
																								 

																								 ?>
																								
																									 <li class="">
																											<span href="" data-name="<?php echo $cta_megamenu_tabsid; ?>" class="is-narrow <?php if($i==0) { $i=1; echo 'active'; } ?>"  data-toggle="tab" aria-controls="<?php echo $cta_megamenu_tabsid; ?>">
																												<?php echo $cta_megamenu_tabslink; ?>

																											</span>
																									 </li>
																								 
																									<?php  // End loop.
																								    endwhile;
																								
																								// No value.
																								else :
																								    // Do something...
																								endif;
																								?>

																								</ul>
																								</div>			

																								<div class="Itg-hero-menu-lower-central column is-9 tab-content">
																								
																								<?php // Check rows exists.
																										if( have_rows('tabs_links', $main_menu_item_ID) ):
																										$i=0;
																										    // Loop through rows.
																										    while( have_rows('tabs_links', $main_menu_item_ID) ) : the_row(); 
																													 $cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID); 
																													 $cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID); 
																													 $cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID); 
																													 $cta_megamenu_tabstitle	= get_sub_field('title_content', $main_menu_item_ID); 
																													 $cta_megamenu_tabsscdncolumn	= get_sub_field('tab_content_2ndcolumn', $main_menu_item_ID); 
																													 
																													 ?>																	  
																														<div class="tab-pane <?php echo $cta_megamenu_tabsid; ?> <?php if($i==0) { $i=1; echo 'active'; } ?>"  role="tabpanel" aria-labelledby="<?php echo $cta_megamenu_tabsid; ?>">
																															<div class="columns is-multiline">
																																<div class="column is-12">
																																	<?php if($cta_megamenu_tabstitle) :  ?>
																																	<p><strong><?php echo $cta_megamenu_tabstitle; ?></strong></p>
																																	<hr>
																																	<?php endif; ?>
																																</div>
																																<?php if($cta_megamenu_tabsscdncolumn) {  ?>
																																<div class="column is-6">
																																	<?php echo $cta_megamenu_tabscontent; ?>
																																</div>
																																<div class="column is-6">
																																	<?php echo $cta_megamenu_tabsscdncolumn; ?>
																																</div>
																																<?php } else { ?>
																																<div class="column is-12">
																																	<?php echo $cta_megamenu_tabscontent; ?>
																																</div>
																																<?php } ?>
																															</div>
																														
																														</div>
																																					<?php  // End loop.
																													    endwhile;
																													
																													// No value.
																													else :
																													    // Do something...
																													endif;
																													?>						
																										</div>
		
																								</div>
																							
																								
																					</div>
																					
																			</div>
																			
																			</div>
																			
																	<!--
=======
			<nav class="navbar" aria-label="main navigation">
				<div class="navbar-brand">
					<a class="navbar-item" href="<?php echo esc_url(home_url('/')); ?>">
						<img class="itgHeader--logo" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
					</a>

					<button class="button navbar-burger is-active" data-target="mega-menu" aria-controls="mega-menu" aria-haspopup="true" aria-label="Menu Button" aria-pressed="false">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</button>
				</div>

				<div id="mega-menu" class="navbar-menu is-active Itg-hero-menu-lower">
					<div class="navbar-start">
						<?php
						$main_mega_menu = wp_get_nav_menu_items('main-mega-menu');
						$itg_submenu_label = get_field('label_submenu', $left_menu_item_ID);



						foreach ($main_mega_menu as $key => $main_menu_item) {

							$main_menu_item_ID = $main_menu_item->ID;
							$main_menu_item_title = $main_menu_item->title;
							$main_menu_item_url = $main_menu_item->url;
							$main_menu_item_target = $main_menu_item->target;
							$main_menu_item_class = $main_menu_item->classes[1];
							$itg_megamenu_bgimage = get_field('background_image', $main_menu_item_ID);
							$itg_megamenu_title = get_field('title_menu', $main_menu_item_ID);
							$itg_megamenu_subtitle = get_field('subtitle_menu', $main_menu_item_ID);
							$itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);
							$itg_megamenu_cta_name = $main_menu_item->post_name;
						?>
							<div class="navbar-item has-dropdown is-mega">
								<div class="navbar-trigger navbar-link flex <?php echo $main_menu_item_class; ?>">
									<span id="itg_header_tab_span_<?php echo $main_menu_item_ID; ?>"><?php echo $main_menu_item_title; ?></span>
								</div>
								<div id="Itg-hero-menu__<?php echo $main_menu_item_ID; ?>Dropdown" class="<?php echo $main_menu_item_class; ?> navbar-dropdown is-link is-hide" style="background-image: url(' <?php echo $itg_megamenu_bgimage; ?>');" data-style="width: 18rem;">

									<div class="itg_bg_heromenu is-fluid">

										<div class="itg__rowtitle">
											<div class="Itg-hero-menu-upper columns is-flex is-vcentered is-multiline">
												<div class="Itg-hero-menu-upper-left column is-6">
													<span><?php echo $itg_megamenu_title; ?></span>
													<p><?php echo $itg_megamenu_subtitle; ?></p>
												</div>
												<div class="Itg-hero-menu-upper-right column is-6">

													<?php if ($itg_megamenu_cta_name == 'servizi') { ?>
														<div class="columns">

															<?php
															// Check rows exists.
															if (have_rows('launch_megamenu', $main_menu_item_ID)) :

																// Loop through rows.
																while (have_rows('launch_megamenu', $main_menu_item_ID)) : the_row();
																	$cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
																	$cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
																	$cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>
																	<div class="column is-6">
																		<div class="Itg_mega_menu_cta">
																			<a href="<?php echo $cta_megamenu_link; ?>">
																				<div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
																				<p><?php echo $cta_megamenu_title; ?></p>
																				<img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
																			</a>
																		</div>
																	</div>

															<?php  // End loop.
																endwhile;

															// No value.
															else :
															// Do something...
															endif;
															?>
														</div>
													<?php } else { ?>
														<?php
														// Check rows exists.
														if (have_rows('launch_megamenu', $main_menu_item_ID)) :

															// Loop through rows.
															while (have_rows('launch_megamenu', $main_menu_item_ID)) : the_row();
																$cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
																$cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
																$cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>

																<div class="Itg_mega_menu_cta">
																	<a href="<?php echo $cta_megamenu_link; ?>">
																		<div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
																		<p><?php echo $cta_megamenu_title; ?></p>
																		<img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
																	</a>
																</div>


														<?php  // End loop.
															endwhile;

														// No value.
														else :
														// Do something...
														endif;
														?>

													<?php } ?>

												</div>
											</div>
										</div>


										<div class="itg_bg_herocolumnsmenu">
											<div class="itg__columns-menus">
												<div class="columns Itg-hero-menu-lower">

													<div class="column is-12 ItgLeftTabs">
														<div class="Itg-hero-menu-lower-left-tabs is-flex-direction-row is-justify-content-space-between is-align-items-center">

															<div class="columns">

																<div class="Itg_mega_menu_cta column is-4">
																	<ul class="itg_navtabs">
																		<?php // Check rows exists.
																		$main_menu_item_ID = $main_menu_item->ID;
																		$main_menu_item_title = $main_menu_item->title;
																		$main_menu_item_url = $main_menu_item->url;
																		$main_menu_item_target = $main_menu_item->target;
																		$main_menu_item_class = $main_menu_item->classes[1];
																		$itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);

																		if (have_rows('tabs_links', $main_menu_item_ID)) :
																			$i = 0;
																			// Loop through rows.
																			while (have_rows('tabs_links', $main_menu_item_ID)) : the_row();
																				$cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID);
																				$cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID);
																				$cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID);
																				$fields = get_fields($main_menu_item_ID);


																		?>

																				<li class="<?php if ($i == 0) {
																								$i = 1;
																								echo 'active';
																							} ?>">
																					<a href="#<?php echo $cta_megamenu_tabsid; ?>" class="is-narrow <?php if ($i == 0) {
																																						$i = 1;
																																						echo 'active';
																																					} ?>" data-toggle="tab" aria-controls="<?php echo $cta_megamenu_tabsid; ?>">
																						<?php echo $cta_megamenu_tabslink; ?>

																					</a>
																				</li>

																		<?php  // End loop.
																			endwhile;

																		// No value.
																		else :
																		// Do something...
																		endif;
																		?>

																	</ul>
																</div>

																<div class="Itg-hero-menu-lower-central column is-8 tab-content">

																	<?php // Check rows exists.
																	if (have_rows('tabs_links', $main_menu_item_ID)) :
																		$i = 0;
																		// Loop through rows.
																		while (have_rows('tabs_links', $main_menu_item_ID)) : the_row();
																			$cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID);
																			$cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID);
																			$cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID);

																	?>
																			<div id="<?php echo $cta_megamenu_tabsid; ?>" class="tab-pane <?php if ($i == 0) {
																																				$i = 1;
																																				echo 'active';
																																			} ?>" role="tabpanel" aria-labelledby="<?php echo $cta_megamenu_tabsid; ?>">
																				<?php echo $cta_megamenu_tabscontent; ?>
																			</div>
																	<?php  // End loop.
																		endwhile;

																	// No value.
																	else :
																	// Do something...
																	endif;
																	?>
																</div>

															</div>


														</div>

													</div>

												</div>

												<!--
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
																								<div class="column is-3 launchlinks">
																									<div class="is-flex is-flex-direction-row is-align-items-center">
																										<a>Scopri anche</a>
																										<img src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
																										</div>
																							</div>
																							-->
<<<<<<< HEAD
																		<div>
																			
																	</div>
																	
														</div>
														
																	</div>
																	
															</div>
															
														</div>
									</div>

									<?php } ?>
								
							 </div>
						</div>
					</nav>
			</div>


							
			
		</header><!-- #masthead -->
	
=======
												<div>

												</div>

											</div>

										</div>

									</div>

								</div>
							</div>

						<?php } ?>

					</div>
				</div>
			</nav>
	</div>




	</header><!-- #masthead -->
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00
