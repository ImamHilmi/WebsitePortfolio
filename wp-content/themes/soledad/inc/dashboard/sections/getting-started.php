<?php
/**
 * Getting started section.
 *
 * @package soledad
 */

?>
<h2 class="nav-tab-wrapper">
	<a href="<?php echo admin_url( 'admin.php?page=soledad_dashboard_welcome' ) ?>" class="nav-tab nav-tab-active"><?php esc_html_e( 'Getting started', 'soledad' ); ?></a>
	<a href="<?php echo admin_url( 'customize.php' ) ?>" class="nav-tab"><?php esc_html_e( 'Customize Style', 'soledad' ); ?></a>
	<a href="<?php echo admin_url( 'admin.php?page=soledad_custom_fonts' ) ?>" class="nav-tab"><?php esc_html_e( 'Custom Fonts', 'soledad' ); ?></a>
	<?php if( function_exists( 'penci_soledad_is_activated' ) && ! penci_soledad_is_activated() ): ?>
	<a href="<?php echo admin_url( 'admin.php?page=soledad_active_theme' ) ?>" class="nav-tab"><?php esc_html_e( 'Active theme', 'soledad' ); ?></a>
	<?php endif; ?>
</h2>

<div id="getting-started" class="gt-tab-pane gt-is-active penci-dashboard-wapper">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Step 1 - Install & Activate The Recommend Plugins', 'soledad' ); ?></h3>
			<p>
				<?php
				/* translators: theme name. */
				esc_html_e( 'Soledad does not require any plugin. All the plugins are add-on features. You can pick any plugin you want for use and install & activate it. If you want to import a demo, please install plugin "Penci Soledad Demo Importer".', 'soledad' );
				echo '<br>';
				echo esc_html__( 'We recommend you check the documentation for this theme first to know how to config this theme:', 'soledad' );
				echo '<br><a rel="nofollow" target="_blank" href="http://soledad.pencidesign.com/soledad-document/">Soledad Documentation</a>';
				?>
			</p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ) ?>" target="_blank"><?php esc_html_e( 'Install Plugins', 'soledad' ); ?></a>

			<h3><?php esc_html_e( 'Step 2 - Import Demo Data (Optional)', 'soledad' ); ?></h3>
			<p><?php _e( '<strong>Note Important:</strong> If your site is new site - no any old posts/pages... You can do the full import ( "Import Demo Style" and "Import Demo Content" ) as normal.
If your site has old data: posts/pages.. Please do import only <strong>Import Demo Style</strong>', 'soledad' );
			?></p>
			<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=import-demo-content' ) ) ?>" target="_blank"><?php esc_html_e( 'Import Demo Now', 'soledad' ); ?></a>
			<h3><?php esc_html_e( 'Step 3 - Customize The Theme', 'soledad' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every general aspect of the theme.', 'soledad' );
			echo '<br>';
			esc_html_e( 'If you want to using Elementor or WPBakery Page Builder plugin to config your homepage, please check guide on the documentation - on "Homepage" section.', 'soledad' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'soledad' ); ?></a>
			</p>
		</div>
		<div class="col">
			<h3><?php esc_html_e( 'Read Full Documentation', 'soledad' ); ?></h3>
			<p class="about"><?php esc_html_e( 'Need any helps to setup and configure the theme? Please check our full documentation for detailed information on how to use it first.', 'soledad' ); ?></p>
			<p>
				<a rel="nofollow" class="button button-primary" href="<?php echo esc_url( 'http://soledad.pencidesign.com/soledad-document/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'soledad' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Video tutorials', 'soledad' ); ?></h3>
			<p><?php echo wp_kses_post( 'We believe that the easiest way to learn is watching a video tutorial. We have a growing library of narrated video tutorials to help you do just that.' ); ?></p>
			<a class="button button-primary" rel="nofollow" href="https://www.youtube.com/watch?v=50GwcSu2fPU&list=PL1PBMejQ2VTzaDTvAmzMZp1kLbAl1lqyJ" target="_blank"><?php esc_html_e( 'View tutorials', 'soledad' ); ?></a>
		</div>
	</div>
	<hr>
	<h3 class="title-more-items"><?php esc_html_e( 'More items by PenciDesign', 'soledad' ) ?></h3>
	<div class="feature-section products three-col">
		<div class="col product">
			<a target="_blank" rel="nofollow" href="<?php echo esc_url( "http://pencidesign.com/" ) ?>" title="<?php echo esc_attr( 'All Themes from PenciDesign' ) ?>">
				<img class="product__image" src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/penci.jpg' ) ?>" alt="" width="300" height="150">
			</a>
			<div class="product__body">
				<h3 class="product__title">
					<a target="_blank" rel="nofollow" href="<?php echo esc_url( "http://pencidesign.com/" ) ?>" title="<?php echo esc_attr( 'All WordPress Themes from PenciDesign' ) ?>">All WordPress Themes from PenciDesign</a>
				</h3>
			</div>
		</div>
		<div class="col product">
			<a target="_blank" rel="nofollow" href="<?php echo esc_url( "https://themeforest.net/item/soledad-multiconcept-blogmagazine-wp-theme/20822517?ref=PenciDesign" ) ?>" title="<?php echo esc_attr( 'PenNews' ) ?>">
				<img class="product__image" src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/pennews.jpg' ) ?>" alt="" width="300" height="150">
			</a>
			<div class="product__body">
				<h3 class="product__title">
					<a target="_blank" rel="nofollow" href="<?php echo esc_url( "https://themeforest.net/item/soledad-multiconcept-blogmagazine-wp-theme/20822517?ref=PenciDesign/" ) ?>" title="<?php echo esc_attr( 'PenNews' ) ?>">PenNews - News/ Magazine/ Business/ Portfolio/ Landing AMP WordPress Theme</a>
				</h3>
			</div>
		</div>
	</div>
</div>
