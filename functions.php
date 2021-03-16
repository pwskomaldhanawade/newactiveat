<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	//Walker Class for Menus

	class themeslug_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	 function start_lvl( &$output, $depth = 0, $args = array() ) {
	// depth dependent classes
	$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 2); // because it counts the first submenu as 0
	$classes = array(
	    'sub-menu',
	    ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	    ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	    'sn-level-' . $display_depth
	    );
	$class_names = implode( ' ', $classes );

	// build html
	$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	global $wp_query;
	$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 1);
		
	// depth dependent classes
	$depth_classes = array(

	    ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	    ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	    ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	    'sn-li-l' . $display_depth
	);
	$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

	// passed classes
	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

	// build html
	$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

	// link attributes
	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	$attributes .= ' class="sn-menu-link ' . ( $depth > 0 ? 'sn-sub-menu-link' : 'sn-main-menu-link' ) . '"';

	$item_output = sprintf( '%1$s<a%2$s><span>%3$s%4$s%5$s</span></a>%6$s',
	    $args->before,
	    $attributes,
	    $args->link_before,
	    apply_filters( 'the_title', $item->title, $item->ID ),
	    $args->link_after,
	    $args->after
	);

	// build html
	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	}

	
	// Emphasize beginning of page    
	function emph_function( $atts, $content = null ) {
	return '<p class="emph">'.do_shortcode($content).'</p>';
	}
	add_shortcode('emph', 'emph_function');

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head() & wp_footer()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */




	


	function starkers_script_enqueuer() {

		//Modernizr - header
		wp_register_script( 'modernizr', get_template_directory_uri().'/js/vendor/modernizr.min.js');
		wp_enqueue_script( 'modernizr' );	


		//Use google jquery library instead of WordPress default - footer
    	wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
		wp_enqueue_script('jquery');

		//Both main.js and plugins.js minified - footer
		wp_register_script( 'plugins', get_template_directory_uri().'/js/production.min.js', array( 'jquery' ), '', true);
		wp_enqueue_script( 'plugins' );


		//Style.css - header
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	



	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/* ========================================================================================================================
	
	Misc
	
	======================================================================================================================== */

	// Excerpt for Pages    
	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
	}
	//Remove Website field from comments & comment styling prompt

	function remove_comment_fields($fields) {
	    unset($fields['url']);
	    return $fields;
	}
	add_filter('comment_form_default_fields','remove_comment_fields');

	function remove_comment_styling_prompt($defaults) {
		$defaults['comment_notes_after'] = '';
		return $defaults;
	}
	add_filter('comment_form_defaults', 'remove_comment_styling_prompt');


	//Remove inline image sizing
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}

	//Plugin Updates
	add_filter( 'auto_update_plugin', '__return_true' );

	//Advanced Custom Fields Options	
	if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	}


	/*================= Responsive images =============*/
	function adjust_image_sizes_attr( $sizes, $size ) {
   $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
   return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'adjust_image_sizes_attr', 10 , 2 );


/**
 * =======================================================================================================================
 * Extend WordPress search to include custom fields
 *
 * ======================================================================================================================= */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

/*Solved gravity form console error*/
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
return true;
}
/*End*/

/*Enable Custom file uplode*/
function custom_upload_mimes ( $existing_mimes=array() ) {
	$existing_mimes['dwg'] = 'application/acad';
	$existing_mimes['ai'] = 'application/postscript';
	$existing_mimes['dxf'] = 'application/dxf';
	$existing_mimes['eps'] = 'application/postscript';
	
	return $existing_mimes;
	}
add_filter('upload_mimes','custom_upload_mimes');

function customtheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
}

add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );


function kia_add_script_to_footer(){
	if( ! is_admin() ) { ?>
	<script>
		function enable_update_cart() {
			jQuery('[name="update_cart"]').removeAttr('disabled');
		}

		function quantity_step_btn() {
			var timeoutPlus;
			jQuery('.quantity .plus').one().on('click', function() {
					$input = jQuery(this).prev('input.qty');
					var val = parseInt($input.val());
					var step = $input.attr('step');
					step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
					$input.val( val + step ).change();

					if( timeoutPlus != undefined ) {
							clearTimeout(timeoutPlus)
					}
					timeoutPlus = setTimeout(function(){
							jQuery('[name="update_cart"]').trigger('click');
					}, 1000);
			});

			var timeoutMinus;
			jQuery('.quantity .minus').one().on('click', function() {
					$input = jQuery(this).next('input.qty');
					var val = parseInt($input.val());
					var step = $input.attr('step');
					step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
					if (val > 1) {
							$input.val( val - step ).change();
					}

					if( timeoutMinus != undefined ) {
							clearTimeout(timeoutMinus)
					}
					timeoutMinus = setTimeout(function(){
							jQuery('[name="update_cart"]').trigger('click');
					}, 1000);
			});

			var timeoutInput;
			jQuery('div.woocommerce').on('change', '.qty', function(){
					if( timeoutInput != undefined ) {
							clearTimeout(timeoutInput)
					}
					timeoutInput = setTimeout(function(){
							jQuery('[name="update_cart"]').trigger('click');
					}, 1000);
			});
		}

		// jQuery(document).ready(function() {
		// 	enable_update_cart();
		// 	quantity_step_btn();
		// });

		// jQuery(document).on( 'updated_cart_totals', function() {
		// 	enable_update_cart();
		// 	quantity_step_btn();
		// });
	</script>
<?php }
}
add_action( 'wp_footer', 'kia_add_script_to_footer' );

function show_subtitle() {
global $product;
$id = $product->get_id();
$subtitle = get_field('pp_sub_title',$id);
	if ( $subtitle ) { 
		echo '<span class="sub-title">'.$subtitle.'</span>';
	}
}
add_action('woocommerce_after_shop_loop_item_title', 'show_subtitle', 3 );

add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
global $product;
if ( $product->is_type( 'variable' ) ) {
	$text = $product->is_purchasable() ? __( 'Add to Cart', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
}
return $text;
}, 10 );

add_filter('wp_insert_post_data', 'edit_slug', 10);

function edit_slug($data) {
	global $post_ID;

	if (!empty($data['post_name']) && $data['post_status'] == "publish" && $data['post_type'] == "product") {
			if (ctype_digit($data['post_name'])) {
					$data['post_name'] = sanitize_title($data['post_title'], $post_ID);
					$data['post_name'] .= '-' . 'item';
			}
	}
	return $data;
}

//add_filter( 'wpseo_primary_term_taxonomies', '__return_empty_array' );

add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);
function wpseo_remove_breadcrumb_link( $link_output , $link ){
	$text_to_remove = 'Products';

	if( $link['text'] == $text_to_remove ) {
		$link_output = '';
	}

	return $link_output;
}


//Hide Price Range for WooCommerce Variable Products
function wc_varb_price_range( $wcv_price, $product ) {
 
	$prefix = sprintf('%s ', __('', 'wcvp_range'));

	$wcv_reg_min_price = $product->get_variation_regular_price( 'min', true );
	$wcv_min_sale_price    = $product->get_variation_sale_price( 'min', true );
	$wcv_max_price = $product->get_variation_price( 'max', true );
	$wcv_min_price = $product->get_variation_price( 'min', true );

	$wcv_price = ( $wcv_min_sale_price == $wcv_reg_min_price ) ?
			wc_price( $wcv_reg_min_price ) :
			'<del>' . wc_price( $wcv_reg_min_price ) . '</del>' . '<ins>' . wc_price( $wcv_min_sale_price ) . '</ins>';

	return ( $wcv_min_price == $wcv_max_price ) ?
			$wcv_price :
			sprintf('%s%s', $prefix, $wcv_price);
}

/**
 * @snippet       WooCommerce Set Default City @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=21223
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.4.6
 */
 
add_filter( 'woocommerce_checkout_fields', 'bbloomer_set_checkout_field_input_value_default' );
 
function bbloomer_set_checkout_field_input_value_default($fields) {
    $fields['billing']['billing_city']['default'] = 'Mumbai';
    return $fields;
}

/*Set Maximum Discount Cap*/

add_action( 'woocommerce_coupon_options_usage_limit', 'woocommerce_coupon_options_usage_limit', 10, 2 );
function woocommerce_coupon_options_usage_limit( $coupon_id, $coupon ){
	echo '
';
	// max discount per coupons
	$max_discount =  get_post_meta( $coupon_id, '_max_discount', true );
	woocommerce_wp_text_input( array(
		'id'                => 'max_discount',
		'label'             => __( 'Usage max discount', 'woocommerce' ),
		'placeholder'       => esc_attr__( 'Unlimited discount', 'woocommerce' ),
		'description'       => __( 'The maximum discount this coupon can give.', 'woocommerce' ),
		'type'              => 'number',
		'desc_tip'          => true,
		'class'             => 'short',
		'custom_attributes' => array(
			'step' 	=> 1,
			'min'	=> 0,
		),
		'value' => $max_discount ? $max_discount : '',
	) );
	echo '
';
}
add_action( 'woocommerce_coupon_options_save', 'woocommerce_coupon_options_save', 10, 2 );
function woocommerce_coupon_options_save( $coupon_id, $coupon ) {
	update_post_meta( $coupon_id, '_max_discount', wc_format_decimal( $_POST['max_discount'] ) );
}

add_filter( 'woocommerce_coupon_get_discount_amount', 'woocommerce_coupon_get_discount_amount', 20, 5 );
function woocommerce_coupon_get_discount_amount( $discount, $discounting_amount, $cart_item, $single, $coupon ) {
	$max_discount = get_post_meta( $coupon->get_id(), '_max_discount', true );
	if ( is_numeric( $max_discount ) && ! is_null( $cart_item ) && WC()->cart->subtotal_ex_tax ) {
		$cart_item_qty = is_null( $cart_item ) ? 1 : $cart_item['quantity'];
		if ( wc_prices_include_tax() ) {
			$discount_percent = ( wc_get_price_including_tax( $cart_item['data'] ) * $cart_item_qty ) / WC()->cart->subtotal;
		} else {
			$discount_percent = ( wc_get_price_excluding_tax( $cart_item['data'] ) * $cart_item_qty ) / WC()->cart->subtotal_ex_tax;
		}
		$_discount = ( $max_discount * $discount_percent ) / $cart_item_qty;
		$discount = min( $_discount, $discount );
	}
	return $discount;
}

/*--------------------------------------------*/


add_filter( 'woocommerce_loop_add_to_cart_link', 'ts_replace_add_to_cart_button', 10, 2 );
function ts_replace_add_to_cart_button( $button, $product ) {
if (is_product_category() || is_shop()) {
$button_text = __("View Product", "woocommerce");
$button_link = $product->get_permalink();
$button = '<a class="button" href="' . $button_link . '">' . $button_text . '</a>';
return $button;
}
}