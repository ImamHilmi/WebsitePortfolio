<?php
if( ! class_exists( 'WooCommerce' ) || get_theme_mod( 'penci_woo_shop_hide_cart_icon' ) ){
	return;
}
?>
<div id="top-search" class="shoping-cart-icon<?php if( get_theme_mod( 'penci_topbar_search_check' ) ): echo ' clear-right'; endif; ?>"><a class="cart-contents" href="<?php $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url(); echo $cart_link; ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php penci_fawesome_icon('fas fa-shopping-cart'); ?><span><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a></div>
