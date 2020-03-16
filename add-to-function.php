/**
 * @snippet       Change "Add to Cart" Button Label if Product Already @ Cart
 * @author        Khalid Almallahi
 * @compatible    WC 3.5.4
 */
 
// Part 1
// Edit Single Product Page Add to Cart
 
add_filter( 'woocommerce_product_single_add_to_cart_text', 'kotsh_custom_add_cart_button_single_product' );
 
function kotsh_custom_add_cart_button_single_product( $label ) {
    
   foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
      $product = $values['data'];
      if( get_the_ID() == $product->get_id() ) {
         $label = __('Already in Cart. Add again?', 'woocommerce');
      }
   }
    
   return $label;
 
}
 
// Part 2
// Edit Loop Pages Add to Cart
 
add_filter( 'woocommerce_product_add_to_cart_text', 'kotsh_custom_add_cart_button_loop', 99, 2 );
 
function kotsh_custom_add_cart_button_loop( $label, $product ) {
    
   if ( $product->get_type() == 'simple' && $product->is_purchasable() && $product->is_in_stock() ) {
       
      foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
         $_product = $values['data'];
         if( get_the_ID() == $_product->get_id() ) {
            $label = __('Already in Cart. Add again?', 'woocommerce');
         }
      }
       
   }
    
   return $label;
    
}
