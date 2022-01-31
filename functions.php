<?php
remove_action( 'woocommerce_product_options_inventory_product_data', 'action_woocommerce_product_options_inventory_product_data', 10, 0 ); 

function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}

add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_add_to_cart_quantity', 10);
add_action('woocommerce_before_single_product', 'tour_cover', 10);
add_action( 'woocommerce_before_single_product_summary', 'section_product_open', 10);
add_action( 'woocommerce_after_single_product_summary', 'section_product_close', 10);
function section_product_open()
{   echo '<section id="book">';
 }
function section_product_close()
{   echo '</section>';
 } 
function tour_cover()
{   echo '<style>
.basic-info-link{  font-size: 16px;
	font-weight: bold;}
.price, .wc-block-grid__product-price {
    position: inherit!important;}
.title-c{
text-decoration: underline;
    padding-bottom: 20px;
    text-decoration-color: #82CF45;
    text-underline-position: under;
    font-weight: 500;
}
.wcfm_catalog_enquiry_button_wrapper{display:none!important;}
.enquiry_form_wrapper_hide{display:none!important;}
.product_meta{display:none!important;}
	#masthead{background:transparent!important}
	#video-modal {
    background: black;
    height: 100%;
    width: 100%;
    position: absolute;
    z-index: 3;
    top: -90px;
    left: 0;
}
	.modal-off{display:none;}
    @media only screen and (min-width: 768px){
    .d-md-inline-flex{
    display: inline;
    margin: 12px;
    }
    .icons{
    margin-top: 600px;
    }
    }
    @media only screen and (max-width: 767px){
    .icons{
    margin-top: 600px;
    }
    .d-md-inline-flex{
    margin: 15px;
    }
    }
    
    .overlay {background-color: rgb(0,0,0,0.2);}
    .background {
    width: 100%;
    height: 650px!important;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: absolute;
    z-index: 0;
    top: 0;
    left: 0;
    }
    .title-cover {
    background-color: rgb(0,0,0,0.3);
    height: 650px;
    color: white;
    text-align: center;
    padding-top:70px;
    z-index: 20;
    }
    .cover-title{
    padding-top: 150px;
    }
    .booking-button {
    text-decoration: none;
    display: inline-block;
    color: #ffffff;
    background-color: #82CF45;
    border-radius: 4px;
    width: auto;
    border: 1px solid #82CF45;
    padding: 10px;
    font-size: 20px;
    text-align: center;
    margin-bottom: 15px;
}
.media-button{
    text-decoration:none;
    display:inline-block;
    color:white;
    font-weight:bold;
    background: rgba(0,0,0,0.2);
    border-radius:4px;
    width:auto;
    padding:10px;
    font-size:20px;
    text-align:center;
    margin-bottom:15px;}
    .title-buttons{
    padding-top: 25px;
    max-width: 700px;
    margin: 0 auto;
    }
    
    </style>';

    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($loop->post->ID), 'big-size');
    $mode = get_field("mode");
    $duration = get_field("duration");
    $pickup = get_field("pickup");
    $language = get_field("language");
 	$overview = get_field("overview");
    $highlights = get_field("highlights");
    $why_go_with_us = get_field("why_go_with_us");
    $included = get_field("included");
    $not_included = get_field("not_included");
    $departure_time = get_field("departure_time");
    $departure_point = get_field("departure_point");
    $what_take = get_field("what_take");
    $notes = get_field("notes");
    $video = get_field("video");
    echo '
    <div class="overlay"><div class="background" style="background-image:url(' . $featured_image[0] . ')">
    <div class="title-cover">
      <h1 class="cover-title">' . get_the_title( $post_id ) . '</h1>
      <div class="wp-block-columns  title-buttons" style="max-width: 700px;margin: 0 auto;">
        <div class="wp-block-column">
    <a class="media-button" id="gallery">
            <svg style="width:20px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 230.629 230.629" style="enable-background:new 0 0 230.629 230.629;" xml:space="preserve">
              <path style="fill:white;" d="M230.629,59.325H0v150.989h230.629V59.325z M115.314,183.373c-26.814,0-48.553-21.738-48.553-48.554 c0-26.814,21.738-48.553,48.553-48.553s48.555,21.739,48.555,48.553C163.869,161.635,142.129,183.373,115.314,183.373z M88.041,20.315h54.547l17.943,28.93H70.1L88.041,20.315z M144.447,134.819c0,16.089-13.043,29.133-29.133,29.133 c-16.088,0-29.131-13.044-29.131-29.133c0-16.089,13.043-29.132,29.131-29.132C131.404,105.688,144.447,118.73,144.447,134.819z"/>
            </svg>
              View Photos</a>
        </div> 
		<div class="wp-block-column">
           <a style="max-width:150px;" href="#book" id="booking-btn" class="booking-button">Book this Tour</a>
        </div>
        <div class="wp-block-column">
          <a class="media-button" id="video">
            <svg style="width:20px;"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 386.972 386.972" style="enable-background:new 0 0 386.972 386.972;" xml:space="preserve">
              <path style="fill:white;"  d="M25.99,0v386.972l334.991-193.486L25.99,0z M55.99,51.972l245.009,141.514L55.99,335V51.972z"/>
            </svg>
            Video Preview</a>
        </div> 
      </div>
    </div>
    </div></div>
    <div class="icons">
  <div class="d-flex d-md-inline-flex align-items-center"><span class="mr-2" style="height:100%; width:100%"><svg style="vertical-align:middle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="32" height="32" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" class=""><g><linearGradient xmlns="http://www.w3.org/2000/svg" id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="256" x2="256" y1="421" y2="91"><stop stop-opacity="1" stop-color="#00b69d" offset="0"></stop><stop stop-opacity="1" stop-color="#00b59c" offset="1"></stop></linearGradient><g xmlns="http://www.w3.org/2000/svg"><g><g><path d="m467 121c-19.4 0-35.972 12.341-42.279 29.584-38.613-2.656-64.661-17.612-89.929-32.122-24.593-14.123-47.822-27.462-78.792-27.462s-54.199 13.339-78.792 27.462c-25.268 14.51-51.316 29.467-89.929 32.122-6.307-17.243-22.879-29.584-42.279-29.584-24.813 0-45 20.187-45 45v30c0 .007.001.015.001.022.002 1.977.421 4.053 1.226 5.916.004.009.006.017.01.026 12.147 28.026 37.614 72.119 66.246 108.338 25.077 31.724 51.75 57.084 79.278 75.378 35.265 23.437 72.019 35.32 109.239 35.32s73.974-11.883 109.239-35.32c27.528-18.294 54.201-43.655 79.278-75.378 28.07-35.508 53.735-79.471 66.246-108.338.038-.125 1.231-2.604 1.235-5.935 0-.01.001-.019.001-.029v-30c.001-24.813-20.186-45-44.999-45zm-407 126.515c-16.32-26.068-26.609-47.417-30-54.752v-26.763c0-8.271 6.729-15 15-15s15 6.729 15 15zm362 42.888c-41.349 52.716-98.744 100.597-166 100.597-67.266 0-124.667-47.901-166-100.597v-109.928c45.047-3.208 75.22-20.534 102.147-35.997 21.938-12.598 40.884-23.478 63.853-23.478s41.915 10.88 63.853 23.478c26.928 15.463 57.101 32.79 102.147 35.997zm60-97.64c-3.391 7.334-13.68 28.684-30 54.752v-81.515c0-8.271 6.729-15 15-15s15 6.729 15 15zm-196 48.237h-15v-15c0-8.284-6.716-15-15-15s-15 6.716-15 15v15h-15c-8.284 0-15 6.716-15 15s6.716 15 15 15h15v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h15c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="url(#SVGID_1_)" data-original="url(#SVGID_1_)" style=""></path></g></g></g></g></svg></span><span class="basic-info-link">COVID-19 Measures taken</span></div>
  <div class="d-flex d-md-inline-flex align-items-center text-nowrap mr-md-4 pb-2 pt-2"><svg style="vertical-align: middle; padding:2px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Capa_1" enable-background="new 0 0 512 512" height="28" viewBox="0 0 512 512" width="28"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="256" x2="256" y1="421" y2="91"><stop offset="0" stop-color="#00b59c"></stop><stop offset="1" stop-color="#00b69d"></stop></linearGradient><g xmlns="http://www.w3.org/2000/svg"><g xmlns="http://www.w3.org/2000/svg"><g><path d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978    c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952    C357.766,320.208,355.981,307.775,347.216,301.211z" fill="#00b69d" data-original="#000000" style="" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg"><g><path d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341    c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341    S375.275,472.341,256,472.341z" fill="#00b69d" data-original="#000000" style="" class=""></path></g></g></g></svg><span><span class="basic-info-link">Duration:&nbsp' . $duration . '</span></span></div>
  <div class="d-flex d-md-inline-flex align-items-center text-nowrap mr-md-4 pb-2 pt-2"><svg style="vertical-align: middle; padding:2px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="30" height="30" x="0" y="0" viewBox="0 0 512.204 512.204" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" id="XMLID_1062_"><g id="XMLID_727_"><path id="XMLID_728_" d="M328.945,285.952c-1.86,1.86-2.92,4.44-2.92,7.07c0,2.64,1.06,5.21,2.92,7.07    c1.87,1.869,4.44,2.93,7.07,2.93c2.64,0,5.21-1.061,7.08-2.93c1.86-1.86,2.92-4.44,2.92-7.07s-1.06-5.2-2.92-7.07    c-1.86-1.859-4.44-2.92-7.08-2.92C333.385,283.032,330.805,284.092,328.945,285.952z" fill="#00b69d" data-original="#000000" style=""></path><path id="XMLID_1327_" d="M505.875,475.27l-0.631-0.631l-26.41-110.984c-11.297-47.474-53.27-80.63-102.069-80.63h-0.746    c-5.523,0-10,4.478-10,10s4.477,10,10,10h0.746c39.497,0,73.468,26.836,82.612,65.261l18.888,79.374l-85.167-85.167    c-1.875-1.875-4.419-2.929-7.071-2.929h-44.52c-1.266,0-2.494,0.249-3.637,0.696c-24.768-14.305-53-21.875-81.768-21.875    c-28.828,0-56.987,7.551-81.782,21.87c-1.139-0.443-2.362-0.691-3.623-0.691h-44.52c-2.652,0-5.196,1.054-7.071,2.929    l-85.228,85.228l18.769-79.329c9.106-38.487,43.088-65.367,82.638-65.367h76.719c12.165,10.718,27.614,16.587,43.972,16.587    c17.798,0,34.53-6.931,47.116-19.516c1.875-1.876,2.929-4.419,2.929-7.071v-51.309c21.825-13.673,37.694-36.002,42.762-62.142    h7.776c18.748,0,34-15.252,34-34v-5.393c0-18.748-15.252-34-34-34h-6.044V94.64c0-52.129-42.41-94.538-94.538-94.538    s-94.538,42.409-94.538,94.538v11.542h-6.044c-18.748,0-34,15.252-34,34v5.393c0,18.748,15.252,34,34,34h7.776    c5.068,26.14,20.937,48.469,42.762,62.142v41.309h-70.646c-23.524,0-46.64,8.037-65.09,22.631    c-18.45,14.595-31.594,35.239-37.01,58.131L6.956,474.644L6.33,475.27c-6.192,6.192-8.028,15.422-4.677,23.513    c3.352,8.092,11.176,13.319,19.933,13.319h67.707c3.534,0,6.806-1.865,8.606-4.907l33.561-56.713l3.071,1.975    c2.992,1.923,6.246,3.177,9.576,3.817c-5.809,14.143-9.021,29.616-9.021,45.828c0,5.522,4.477,10,10,10s10-4.478,10-10    c0-24.257,8.596-46.542,22.899-63.975l42.451,42.452c-3.808,6.286-6.003,13.653-6.003,21.523c0,5.522,4.477,10,10,10    s10-4.478,10-10c0-11.947,9.72-21.668,21.668-21.668s21.668,9.721,21.668,21.668c0,5.522,4.477,10,10,10s10-4.478,10-10    c0-7.87-2.195-15.237-6.003-21.523l42.451-42.451c14.303,17.433,22.899,39.718,22.899,63.975c0,5.522,4.477,10,10,10    s10-4.478,10-10c0-16.212-3.212-31.685-9.021-45.828c3.33-0.64,6.584-1.894,9.576-3.817l3.071-1.975l33.561,56.713    c1.8,3.042,5.072,4.907,8.606,4.907h67.707c8.757,0,16.582-5.228,19.933-13.319C513.903,490.692,512.067,481.463,505.875,475.27z     M370.557,140.182v5.393c0,7.72-6.28,14-14,14h-6.044v-33.393h6.044C364.277,126.182,370.557,132.463,370.557,140.182z     M181.437,94.64c0-41.101,33.438-74.538,74.538-74.538s74.538,33.438,74.538,74.538v11.542h-26.261    c-5.24,0-10.267-1.396-14.652-4.013c5.533-3.999,10.785-8.469,15.706-13.39c3.905-3.905,3.905-10.237,0-14.143    c-3.905-3.904-10.237-3.904-14.142,0c-20.341,20.342-47.387,31.545-76.155,31.545h-33.571V94.64z M141.393,145.575v-5.393    c0-7.72,6.28-14,14-14h6.044v33.393h-6.044C147.673,159.575,141.393,153.295,141.393,145.575z M181.438,161.567v-35.385h33.571    c19.801,0,38.914-4.476,56.183-12.95c9.022,8.366,20.688,12.95,33.061,12.95h26.261v35.365c0,41.101-33.438,74.538-74.538,74.538    C214.881,236.086,181.448,202.658,181.438,161.567z M255.975,256.086c10.498,0,20.601-1.723,30.044-4.896v37.457    c-17.297,14.594-42.792,14.594-60.089,0V251.19C235.374,254.363,245.477,256.086,255.975,256.086z M325.895,376.458l-8.111,13.877    c-1.15,1.968-2.022,4.041-2.639,6.165c-17.476-9.81-37.616-15.415-59.043-15.415c-21.427,0-41.567,5.605-59.043,15.415    c-0.617-2.124-1.489-4.196-2.639-6.164l-8.109-13.874c21.268-11.834,45.247-18.076,69.791-18.076    C280.597,358.386,304.644,364.633,325.895,376.458z M83.591,492.102H21.586c-0.288,0-1.053,0-1.456-0.973s0.138-1.514,0.342-1.717    l56.839-56.839l26.076,26.076L83.591,492.102z M133.547,428.048c-2.284-1.469-5.067-1.947-7.712-1.319    c-2.643,0.626-4.918,2.3-6.301,4.638l-5.63,9.514l-22.449-22.449l38.866-38.866h34.64l12.194,20.864    c1.58,2.702,1.28,6.121-0.745,8.508l-21.433,25.261c-2.387,2.813-6.527,3.428-9.63,1.436L133.547,428.048z M234.579,466.437    l-42.451-42.452c17.433-14.303,39.718-22.899,63.975-22.899s46.542,8.596,63.975,22.899l-42.452,42.452    c-6.286-3.808-13.653-6.002-21.523-6.002C248.232,460.434,240.865,462.629,234.579,466.437z M378.658,428.047l-11.8,7.586    c-3.103,1.996-7.243,1.378-9.629-1.435l-21.433-25.261c-2.025-2.387-2.325-5.806-0.745-8.509l12.194-20.863h34.64l38.866,38.866    l-22.449,22.449l-5.63-9.514c-1.383-2.338-3.658-4.012-6.301-4.638C383.726,426.102,380.943,426.579,378.658,428.047z     M492.074,491.13c-0.403,0.973-1.167,0.973-1.456,0.973h-62.005l-19.796-33.452l26.076-26.076l56.839,56.839    C491.936,489.616,492.477,490.157,492.074,491.13z" fill="#00b69d" data-original="#000000" style=""></path></g></g></g></svg><span class="basic-info-link">Transport:&nbsp' . $pickup . '</span></div>
  <div class="product-languages d-flex d-md-inline-flex align-items-center text-nowrap mr-md-4 pb-2 pt-2"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="28" height="28" x="0" y="0" viewBox="0 0 512 512" style="vertical-align: middle; padding:2px" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg"><path d="m460.747 439.163c89.119-102.791 58.111-262.592-63.094-324.93-35.004-67.784-105.754-114.233-187.153-114.233-116.064 0-210.488 94.43-210.488 210.5 0 51.099 18.088 99.427 51.237 137.663l-46.774 46.16c-9.48 9.357-2.913 25.612 10.465 25.677l112.956.538c38.925 56.641 103.228 91.462 173.6 91.462.144 0 195.446-.999 195.561-1 13.333-.064 19.975-16.29 10.464-25.677zm-377.985-101.146c-34.017-34.08-52.752-79.367-52.752-127.517 0-99.528 80.968-180.5 180.49-180.5s180.49 80.972 180.49 180.5c0 95.373-75.473 181.269-186.343 180.403l-153.258-.73 31.293-30.882c5.918-5.842 5.953-15.389.08-21.274zm218.734 143.983c-52.634 0-101.557-22.489-135.565-61.281 57.104.376 41.945.281 44.569.281 135.402 0 236.506-127.009 204.689-259.617 82.966 67.774 89.761 191.779 14.045 267.634-5.874 5.885-5.838 15.433.08 21.274l31.293 30.882c-.119 0-158.995.827-159.111.827z" fill="#00b69d" data-original="#000000" style=""></path><path d="m121.005 166h179.99c8.284 0 14.999-6.716 14.999-15s-6.715-15-14.999-15h-179.99c-8.284 0-14.999 6.716-14.999 15s6.716 15 14.999 15z" fill="#00b69d" data-original="#000000" style=""></path><path d="m121.005 226h179.99c8.284 0 14.999-6.716 14.999-15s-6.715-15-14.999-15h-179.99c-8.284 0-14.999 6.716-14.999 15s6.716 15 14.999 15z" fill="#00b69d" data-original="#000000" style=""></path><path d="m121.005 286h179.99c8.284 0 14.999-6.716 14.999-15s-6.715-15-14.999-15h-179.99c-8.284 0-14.999 6.716-14.999 15s6.716 15 14.999 15z" fill="#00b69d" data-original="#000000" style=""></path></g></g></svg><span class="basic-info-link">Language:&nbsp' . $language . '</span></div>
  <div class="d-flex d-md-inline-flex align-items-center text-nowrap mr-md-4 pb-2 pt-2"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="28" height="28" x="0" y="0" viewBox="0 0 511 512" style="vertical-align: middle; padding:2px" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m497.871094 467.601562v-14.976562c0-8.019531-6.527344-14.546875-14.550782-14.546875h-5.484374v-143.097656c0-4.144531-3.359376-7.5-7.5-7.5-4.144532 0-7.5 3.355469-7.5 7.5v143.097656h-20.105469c0-39.527344 0-285.046875 0-321.191406h20.105469v143.09375c0 4.144531 3.355468 7.5 7.5 7.5 4.140624 0 7.5-3.355469 7.5-7.5v-143.09375h5.484374c8.023438 0 14.550782-6.527344 14.550782-14.550781v-15.363282c0-4.769531-2.320313-9-5.878906-11.65625 5.582031-7.933594 8.648437-17.429687 8.648437-27.453125 0-26.390625-21.46875-47.863281-47.863281-47.863281-26.390625 0-47.863282 21.472656-47.863282 47.863281 0 10.023438 3.066407 19.519531 8.652344 27.453125-3.5625 2.652344-5.878906 6.882813-5.878906 11.65625v15.363282c0 8.023437 6.523438 14.546874 14.546875 14.546874h5.09375c-41.710937 40.71875-96.425781 65.28125-154.503906 69.25-4.132813.28125-7.253907 3.859376-6.972657 7.992188.285157 4.132812 3.855469 7.257812 7.996094 6.972656 57.058594-3.898437 111.066406-26.515625 153.882813-64.128906v22.308594c-96.242188 91.566406-247.390625 91.71875-343.792969 0v-22.308594c42.820312 37.613281 96.828125 60.230469 153.886719 64.128906 4.15625.289063 7.710937-2.839844 7.992187-6.972656.285156-4.132812-2.835937-7.710938-6.96875-7.992188-58.078125-3.96875-112.796875-28.53125-154.503906-69.25h5.082031c8.023438 0 14.546875-6.523437 14.546875-14.546874v-15.363282c0-4.769531-2.316406-9-5.878906-11.65625 5.585938-7.933594 8.652344-17.429687 8.652344-27.453125 0-26.390625-21.472656-47.863281-47.863282-47.863281-26.390624 0-47.863281 21.472656-47.863281 47.863281 0 10.023438 3.066407 19.519531 8.648438 27.453125-3.558594 2.65625-5.878907 6.882813-5.878907 11.65625v15.363282c0 8.023437 6.527344 14.546874 14.550782 14.546874h5.496094v321.195313h-5.496094c-8.023438 0-14.550782 6.527344-14.550782 14.546875v14.976562c-7.433593.644532-13.289062 6.886719-13.289062 14.484376v15.367187c0 8.019531 6.527344 14.546875 14.546875 14.546875h87.679687c8.019532 0 14.546876-6.527344 14.546876-14.546875v-15.367187c0-7.597657-5.859376-13.847657-13.300782-14.484376v-14.976562c0-8.019531-6.523437-14.546875-14.546875-14.546875h-5.488281v-258.617187c98.738281 84.652343 244.882812 84.800781 343.792969 0v258.617187h-5.496094c-8.023437 0-14.550781 6.527344-14.550781 14.546875v14.976562c-7.433594.644532-13.289063 6.886719-13.289063 14.484376v15.367187c0 8.019531 6.527344 14.546875 14.550781 14.546875h87.675782c8.023437 0 14.550781-6.527344 14.550781-14.546875v-15.367187c0-7.597657-5.863281-13.847657-13.300781-14.484376zm-471.851563-419.738281c0-18.121093 14.742188-32.863281 32.863281-32.863281 18.121094 0 32.863282 14.742188 32.863282 32.863281 0 9.496094-3.996094 18.316407-11.039063 24.5625h-43.648437c-7.042969-6.242187-11.039063-15.066406-11.039063-24.5625zm76.253907 434.675781v14.460938h-86.773438v-14.460938zm-13.296876-29.460937v14.460937h-60.1875v-14.460937zm-40.140624-15v-321.191406h20.101562v321.191406zm-20.046876-336.191406v-14.460938h60.1875v14.460938c-6.269531 0-53.828124 0-60.1875 0zm391.125-54.023438c0-18.121093 14.742188-32.863281 32.863282-32.863281s32.863281 14.742188 32.863281 32.863281c0 9.496094-3.996094 18.316407-11.039063 24.5625h-43.648437c-7.042969-6.246093-11.039063-15.070312-11.039063-24.5625zm2.773438 54.023438v-14.460938h60.183594v14.460938c-6.457032 0-53.90625 0-60.183594 0zm0 351.191406h60.183594v14.460937h-60.183594zm73.484375 43.921875h-86.777344v-14.460938h86.777344zm0 0" fill="#00b69d" data-original="#000000" style=""></path></g></svg><span class="basic-info-link">Mode:&nbsp' . $mode . '</span></div>
</div>
<div class="woocommerce-product-details__short-description">
  <h2 class="title-c">Overview</h2>
  <p>'. $overview .'</p>
</div>
<div class="highlights">
  <h2 class="title-c">Highlights</h2>
    <p>'. $highlights .'</p>
</div>
<div class="why">
    <h2 class="title-c">Why go with us</h2>
    <p>'. $why_go_with_us .'</p>
</div>
<div class="included">
  <h3 class="title-c">Included</h3>
  <p>'. $included .'</p>
</div>
<div class="not included">
  <h3 class="title-c">Not included</h3>
  <p>'. $not_included .'</p>
</div>
<div class="departure-time">
  <h3 class="title-c">Departure Time</h3>
    <p>'. $departure_time .'</p>
</div>
<div class="departure-point">
  <h3 class="title-c">Departure Point</h3>
    <p>'. $departure_point .'</p>
</div>
<div class="what_take">
  <h3 class="title-c">What to take with you</h3>
    <p>'. $what_take .'</p>
</div>
<div class="notes">
  <h2 class="title-c">Notes</h2>
    <p>'. $notes .'</p>
</div>
<div id="video-modal" class="modal-off">
  <div class="col-12 close-div"><button id="close-video" class="btn-close">x</button></div>
</div>
<script>
    var gallery = document.getElementById("gallery");
    gallery.onclick = function(){
    console.log("gallery");
    var photoswipes = document.getElementsByClassName("woocommerce-product-gallery__trigger");
    var photoswipe = photoswipes[0];
    photoswipe.click();
};
</script>
<script>
var videobutton = document.getElementById("video");
videobutton.onclick = function(){
    var videomodal = document.getElementById("video-modal");  
    videomodal.style.display = "block";
    var node = document.createElement("iframe");
    node.setAttribute("id", "video-iframe");
    node.src += "'. $video .'";
      node.style.width ="100%";
    node.style.height ="400px";
    node.frameborder="0"; 
    node.allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"; 
    videomodal.appendChild(node);
                              }
var closev= document.getElementById("close-video");
closev.onclick = function(){
    var videomodal = document.getElementById("video-modal");  
    videomodal.style.display = "none";
    var videoframe = document.getElementById("video-iframe"); 
    videoframe.remove();
    }
    </script>
    ';

}
//remove breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
// remove tabs
add_filter( 'woocommerce_product_tabs', 'my_remove_all_product_tabs', 98 );
 
function my_remove_all_product_tabs( $tabs ) {
  unset( $tabs['description'] );        // Remove the description tab
  unset( $tabs['additional_information'] );    // Remove the additional information tab
  return $tabs;
}
// remove  description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

function addPriceSuffix($format, $currency_pos) {
	switch ( $currency_pos ) {
		case 'left' :
			$currency = get_woocommerce_currency();
			$format = '%1$s%2$s&nbsp;' . $currency;
		break;
	}
 
	return $format;
}
 
add_action('woocommerce_price_format', 'addPriceSuffix', 1, 2);

function destinations( $atts ) {
 ob_start();
 get_template_part( 'destinations' );
 return ob_get_clean();
}
add_shortcode( 'destinations', 'destinations');

function home( $atts ) {
 ob_start();
 get_template_part( 'home' );
 return ob_get_clean();
}
add_shortcode( 'home', 'home');

function icons( $atts ) {
 ob_start();
 get_template_part( 'icons' );
 return ob_get_clean();
}
add_shortcode( 'icons', 'icons');
?>