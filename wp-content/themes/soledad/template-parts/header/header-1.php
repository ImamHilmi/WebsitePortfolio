<?php $navigation_class = penci_soledad_sitenavigation_classes(); ?>
<?php if ( ! get_theme_mod( 'penci_vertical_nav_show' ) ) : ?>

	<?php
	$header_trans      = penci_is_header_transparent();
	$dis_sticky_header = get_theme_mod( 'penci_disable_sticky_header' );
	if( $dis_sticky_header ){
		echo '<div class="sticky-wrapper">';
	}
	?>
	<nav id="navigation" class="<?php echo esc_attr( $navigation_class ); ?>" role="navigation" <?php if( ! get_theme_mod('penci_schema_sitenav') ): ?>itemscope itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
		<div class="<?php penci_soledad_get_header_width(); ?>">
			<div class="button-menu-mobile header-1"><?php penci_fawesome_icon('fas fa-bars'); ?></div>
			<?php
			get_template_part( 'template-parts/header/logo-mobile' );
			get_template_part( 'template-parts/header/menu' );

			if ( ! get_theme_mod( 'penci_topbar_search_check' ) ) {
				get_template_part( 'template-parts/header/top-search' );
			}
			get_template_part( 'template-parts/menu-hamburger-icon' );
			?>
			<?php if ( class_exists( 'WooCommerce' ) && ! get_theme_mod( 'penci_woo_shop_hide_cart_icon' ) ): ?>
				<?php get_template_part( 'template-parts/header/cart-icon' ); ?>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'penci_header_social_nav' ) ) : ?>
				<div class="main-nav-social <?php if ( get_theme_mod( 'penci_header_social_brand' ) ): echo ' penci-social-textcolored'; endif; ?>">
					<?php get_template_part( 'inc/modules/socials' ); ?>
				</div>
			<?php endif; ?>

		</div>
		<?php
		if( $dis_sticky_header ){
			echo '</div>';
		}
		?>
	</nav><!-- End Navigation -->
<?php endif; ?>
<?php get_template_part( 'template-parts/header/header-second' ); ?>

