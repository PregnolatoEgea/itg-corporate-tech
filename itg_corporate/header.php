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
			if ($left_menu_item->menu_item_parent == 0) {

				foreach ($left_menu as $key => $left_menu_item) {
					$left_menu_item_ID = $left_menu_item->ID;

			?>
					<div id="Itg_PreHeaderData_<?php echo $left_menu_item_ID; ?>" class="itgPreHeader__bottomSide" data-menu-id="Itg_PreHeaderData_<?php echo $key; ?>">
						<div class="columns">
							<div class="column">
								<ul class="Itg_PreHeaderData_submenu">
									<?php
									foreach ($left_menu as $key => $left_menu_item) {
										if ($left_menu_item->menu_item_parent >= 1) {
											$left_menu_item_title = $left_menu_item->title;
											$left_menu_item_url = $left_menu_item->url;
											$left_menu_item_target = $left_menu_item->target;
											$left_menu_item_ID = $left_menu_item->ID;
											$itg_submenu_label = get_field('label_submenu', $left_menu_item_ID);

									?>
											<?php if ($itg_submenu_label) { ?>
												<li class="itg_submenulabel"><span><?php echo $left_menu_item_title; ?></span></li>
											<?php } else { ?>
												<li><a href="<?php echo $left_menu_item_url; ?>"><?php echo $left_menu_item_title; ?></a></li>
											<?php } ?>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				<?php } ?>
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

					?>
							<div class="itg_a_container">
								<a id="itg_a_button_<?php echo $key; ?>" data-target="Itg_PreHeaderData_<?php echo $left_menu_item_ID; ?>" href="#" class="itgPreHeader--singleItem itg-mr-10">
									<?php
									if (get_field('image', $left_menu_item->ID)) {
									?>
										<img id="itg_a_image_<?php echo $key; ?>" class="itg-mr-10" src="<?php echo get_field('image', $left_menu_item_ID); ?>" alt="<?php echo $left_menu_item_title; ?>">
									<?php } ?>
									<?php echo $left_menu_item_title; ?></a>
							</div>
						<?php
						}
						?>
					<?php
					}
					?>
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
								<a target="<?php echo $links_menu_item_target; ?>" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
									<img class="itg-mr-10" src="<?php echo get_field('image', $links_menu_item_ID); ?>" alt="<?php echo $links_menu_item_title; ?>">
								</a>
							<?php
							} else if (get_field('link_tipology', $links_menu_item_ID) === 'linblank') {
							?>
								<a target="<?php echo $links_menu_item_target; ?>" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
									<?php echo $links_menu_item_title; ?>
									<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/external_page_blue.svg" alt="<?php echo $links_menu_item_title; ?>">
								</a>
							<?php
							} else if (get_field('link_tipology', $links_menu_item_ID) === 'linkself') {
							?>
								<a target="<?php echo $links_menu_item_target; ?>" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
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
							<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
								<?php echo $right_menu_item_title; ?>
								<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/external_page_blue.svg" alt="<?php echo $right_menu_item_title; ?>">
							</a>
						<?php
						} else if (get_field('link_tipology', $right_menu_item_ID) === 'linkself') {
						?>
							<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
								<?php echo $right_menu_item_title; ?>
								<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/internal_page_blue.svg" alt="<?php echo $right_menu_item_title; ?>">
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
						<a class="itgPreHeader--singleItem itg-mr-10">
							<!-- Selettore Lingua WPML -->
							<?php do_action('wpml_add_language_selector'); ?>
						<?php
					}
						?>
				</div>
			</div>

			<div class="itgHeader itg-px-56">
				<div class="columns fw-helper is-centered">
					<div class="itgHeader__leftSide column is-2  is-justify-content-flex-start">
						<a href="<?php echo get_home_url(); ?>">
							<img class="itgHeader--logo" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
						</a>
					</div>
					<div class="itgHeader__leftSide column is-6 is-justify-content-flex-start">
						<div class="itgHeader--mainmegamenu tabs">
							<ul>

								<?php
								$main_menu = wp_get_nav_menu_items('main-menu');
								$itg_submenu_label = get_field('label_submenu', $left_menu_item_ID);

								foreach ($main_menu as $key => $main_menu_item) {
									$main_menu_item_ID = $main_menu_item->ID;
									$main_menu_item_title = $main_menu_item->title;
									$main_menu_item_url = $main_menu_item->url;
									$main_menu_item_target = $main_menu_item->target;

								?>
									<li id="itg_header_tab_<?php echo $main_menu_item_ID; ?>">
										<a class="navbar-trigger" data-target="Itg-hero-menu__<?php echo $main_menu_item_ID; ?>">
											<span id="itg_header_tab_span_<?php echo $main_menu_item_ID; ?>"><?php echo $main_menu_item_title; ?></span>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>

					</div>
					<div class="itgHeader__rightSide  column is-4 is-justify-content-flex-end">
						<div class="itgMainMenu__highlightedItems is-hidden-touch is-flex">
							<?php
							$main_menu = wp_get_nav_menu_items('main-menu');

							foreach ($main_menu as $key => $main_menu_item) {
								$main_menu_item_ID = $main_menu_item->ID;
								$main_menu_item_title = $main_menu_item->title;
								$main_menu_item_url = $main_menu_item->url;
								$main_menu_item_target = $main_menu_item->target;

								if (get_field('is_highlighted', $main_menu_item_ID)) {
							?>
									<a class="itgMainMenu__highlightedItems--single p1 itg--color-blue-1 itg-py-16 itg-px-16" target="<?php echo $main_menu_item_target; ?>" href="<?php echo $main_menu_item_url; ?>"><?php echo $main_menu_item_title; ?></a>
							<?php
								}
							}
							?>
						</div>
						<div class="itgMainMenu__toggle itg-pl-8 itg-pr-16 itg-mr-10">
							<button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation">
								<span class="itgMainMenu__searchBox--content">Servizi</span>
								<span class="hamburger-box">
									<!--<span class="hamburger-inner"></span>-->
									<span class="hamburger-inner">
										<img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/right-arrow.svg" alt="Open menu"></span>
								</span>
							</button>
						</div>
						<div id="itgMainMenu__searchBox" class="itgMainMenu__searchBox itg-px-8">
							<span class="itgMainMenu__searchBox--content">Cerca nel sito</span>
							<img class="itgMainMenu__searchBox--icon" id="main_search" src="<?php echo get_template_directory_uri() . '/src/images/icons/search_icon-white.svg'; ?>" alt="Icona ricerca">
							<div class="itgMainMenu__searchBox--searchInput">
								<span id="itgMainMenu__searchBox--close" class="itgMainMenu__searchBox--close">
									<img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/close.svg" alt="Close">
								</span>
								<?php echo do_shortcode('[wd_asp id=1]'); ?>
							</div>
							<div class="itgMainMenu__searchBox--overlay"></div>
						</div>

						<div class="itgMainMenu__supContainer itg-px-32 itg-py-8 is-hide">
							<a href="<?php echo get_home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
							</a>
							<a href="<?php echo get_home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/home.svg" alt="Home">
							</a>
						</div>
						<div class="itgMainMenu__container itg-px-32 itg-py-8">
							<?php
							$main_menu = wp_get_nav_menu_items('main-menu');

							foreach ($main_menu as $key => $main_menu_item) {
								$main_menu_item_ID = $main_menu_item->ID;
								$main_menu_item_parent = $main_menu_item->menu_item_parent;
								$main_menu_item_title = $main_menu_item->title;
								$main_menu_item_url = $main_menu_item->url;
								$main_menu_item_target = $main_menu_item->target;

							?>
								<div class="itgMainMenu__container--single itg-mt-16">
									<?php echo $main_menu_item_title; ?>
								</div>
							<?php

							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
			$main_menu = wp_get_nav_menu_items('main-menu');
			if ($main_menu->menu_item_parent == 0) {


				foreach ($main_menu as $key => $main_menu_item) {
					$main_menu_item_ID = $main_menu_item->ID;
					$main_menu_item_title = $main_menu_item->title;
					$main_menu_item_url = $main_menu_item->url;
					$main_menu_item_target = $main_menu_item->target;


			?>
					<section id="Itg-hero-menu__<?php echo $main_menu_item_ID ?>" class="hero is-link is-fullheight-with-navbar">
						<!--<div class="hero-body">
							<p class="title">
								<?php //echo $main_menu_item_title; 
								?>
							</p>
						</div>-->
						<div class="Itg-hero-menu-upper is-flex is-flex-direction-row is-justify-content-space-around is-align-items-center">
							<div class="Itg-hero-menu-upper-left">
								<span>Chi siamo: azienda leader di mercato</span>
								<p>Da oltre 180 anni, siamo leader in Italia nella distribuzione del gas naturale</p>
							</div>
							<div class="Itg-hero-menu-upper-right">Prova</div>
						</div>
						<div class="columns Itg-hero-menu-lower">
							<div class="column">
								<?php
								$tabs = ["Il nostro gruppo", "Investitori", "Media", "Sostenibilità", "Governance"];

								foreach ($tabs as $tab) {
								?>
									<div class="is-flex is-flex-direction-row is-justify-content-space-between is-align-items-center">
										<p><?php echo $tab; ?></p>
										<div> > </div>
									</div>
								<?php } ?>
							</div>
							<div class="column">
								<span>Il nostro gruppo</span>
								<div class="divider-x"></div>
								<div class="columns">
									<div class="column">
										<span>Il nostro ruolo e purpose</span>
										<span>Le nostre attività</span>

										<?php
										$activity = ["Modello di business", "I nostri peers"];

										foreach ($activity as $act) {
										?>
											<p> <?php echo $act; ?> </p>
										<?php } ?>

										<span>I nostri progetti chiave</span>
										<span>Le società del gruppo</span>

										<?php
										$society = ["Italgas Reti", "Medea", "Metano San'Angelo Lodigiano", "Toscana Energia", "Umbria Distribuzione Gas", "Italgas Acqua"];

										foreach ($society as $soc) {
										?>
											<p> <?php echo $soc; ?> </p>
										<?php } ?>
									</div>
									<div class="column">
										<?php
										$sites = ["Seaside", "Gaxa"];

										foreach ($sites as $site) {
										?>
											<p><?php echo $site ?></p>
										<?php
										}
										?>

										<span>I nostri manager</span>
										<span>Italgas innova/Innovazione e trasformazione digitale</span>

										<?php
										$innovation = ["Infrastruttura digitale", "Digital Factory", "Sperimentazione sull'idrogeno"];

										foreach ($innovation as $inn) {
										?>
											<p><?php echo $inn ?></p>
										<?php
										}
										?>

										<span>La nostra storia</span>
										<?php
										$story = ["Heritage Lab Italgas"];

										foreach ($story as $s) {
										?>
											<p><?php echo $s ?></p>
										<?php
										}
										?>
									</div>
								</div>
							</div>
							<div class="column">
								<div class="is-flex is-flex-direction-row is-align-items-center">
									<a>Scopri anche</a>
									<div> > </div>
								</div>
								<?php
								$lanci = ["Lancio 1", "Lancio 2", "Lancio 3", "Lancio 4", "Lancio 5"];

								foreach ($lanci as $l) {
								?>
									<p><?php echo $l; ?></p>
								<?php } ?>
							</div>
						</div>
						<div></div>
					</section>
				<?php
				}
				?>
			<?php
			}
			?>
		</header><!-- #masthead -->