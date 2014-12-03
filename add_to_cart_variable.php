//usages   [add_to_cart_variable]
 
add_shortcode('add_to_cart_variable', 'add_to_cart_variable_function');
 
function add_to_cart_variable_function(){
 
 
    global $product;
 
    // Enqueue variation scripts
    wp_enqueue_script( 'wc-add-to-cart-variation' );
    ob_start();
    // Load the template
    wc_get_template( 'single-product/add-to-cart/variable.php', array(
        'available_variations'  => $product->get_available_variations(),
        'attributes'   			=> $product->get_variation_attributes(),
        'selected_attributes' 	=> $product->get_variation_default_attributes()
    ) );
 
    $output = ob_get_contents();
    ob_clean();
 
    return $output;
 
}
