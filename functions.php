<?php
/**
 * List of files inclusion and functions
 *
 * Define global variables:
 * $themename : theme name information
 * $shortname : short name information
 * $version : current theme version
 * 
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

global $themename, $shortname, $version;
	
$themename = 'Newmagz';
$shortname = 'newmagz';
$version = wp_get_theme()->Version;


// Include theme functions
require_once get_template_directory() . '/functions/theme-functions/theme-widgets.php'; // Load widgets
require_once get_template_directory() . '/functions/theme-functions/theme-support.php'; // Load theme support
require_once get_template_directory() . '/functions/theme-functions/theme-composer.php'; // Load custom Visual Composer element
require_once get_template_directory() . '/functions/theme-functions/theme-functions.php'; // Load custom functions
require_once get_template_directory() . '/functions/theme-functions/theme-styles.php'; // Load JavaScript, CSS & comment list layout
require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php'; // Load TGM-Plugin-Activation


/**
 * Loads the Options Panel
 * 
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */

if ( !isset( $newmagz_option ) && file_exists( get_template_directory() . '/functions/theme-functions/theme-options.php' ) ) {
	require_once get_template_directory() . '/functions/theme-functions/theme-options.php';
}

/**
 * After setup theme
 *
 * @package WordPress
 * @subpackage Newmagz
 * @since Newmagz 1.0.0
 */
function warrior_theme_init(){
	add_action( 'widgets_init', 'warrior_register_sidebars' );
}
add_action( 'after_setup_theme', 'warrior_theme_init' );

/**
 * required & recommended plugins
 */
function warrior_required_plugins() {
	$plugins = array(
		// array(
		// 	'name'			=> 'WPBakery Visual Composer',
		// 	'version' 		=> '4.7.4',
		// 	'slug'			=> 'js_composer',
		// 	'source'		=> get_template_directory() . '/plugins/js_composer.zip',
		// 	'external_url'	=> '',
		// 	'required'		=> true,
		// ),
		// array(
		// 	'name'			=> 'Redux Framework',
		// 	'slug'			=> 'redux-framework',
		// 	'required'		=> true,
		// ),
		// array(
		// 	'name'			=> 'Recent Tweets Widget',
		// 	'slug'			=> 'recent-tweets-widget',
		// 	'required'		=> true,
		// ),
		array(
			'name'			=> 'WordPress SEO by Yoast',
			'slug'			=> 'wordpress-seo',
			'required'		=> false,
		),
		// array(
		// 	'name'			=> 'Contact Form 7',
		// 	'slug'			=> 'contact-form-7',
		// 	'required'		=> false,
		// ),
		// array(
		// 	'name'			=> 'MailChimp for WordPress',
		// 	'slug'			=> 'mailchimp-for-wp',
		// 	'required'		=> false,
		// ),
		// array(
		// 	'name'			=> 'WP-PageNavi',
		// 	'slug'			=> 'wp-pagenavi',
		// 	'required'		=> false,
		// ),
		// array(
		// 	'name'			=> 'ZillaShortcodes',
		// 	'version' 		=> '2.0.2',
		// 	'slug'			=> 'zilla-shortcodes',
		// 	'source'		=> get_template_directory() . '/plugins/zilla-shortcodes.zip',
		// 	'external_url'	=> '',
		// 	'required'		=> true,
		// ),
	);

	$string = array(
		'page_title'                      => esc_html__( 'Install Required Plugins', 'tgmpa' ),
		'menu_title'                      => esc_html__( 'Install Plugins', 'tgmpa' ),
		'installing'                      => esc_html__( 'Installing Plugin: %s', 'tgmpa' ),
		'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'tgmpa' ),
		'notice_can_install_required'     => _n_noop(
			'This theme requires the following plugin: %1$s.',
			'This theme requires the following plugins: %1$s.',
			'tgmpa'
		),
		'notice_can_install_recommended'  => _n_noop(
			'This theme recommends the following plugin: %1$s.',
			'This theme recommends the following plugins: %1$s.',
			'tgmpa'
		),
		'notice_cannot_install'           => _n_noop(
			'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
			'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
			'tgmpa'
		),
		'notice_ask_to_update'            => _n_noop(
			'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
			'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
			'tgmpa'
		),
		'notice_ask_to_update_maybe'      => _n_noop(
			'There is an update available for: %1$s.',
			'There are updates available for the following plugins: %1$s.',
			'tgmpa'
		),
		'notice_cannot_update'            => _n_noop(
			'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
			'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
			'tgmpa'
		),
		'notice_can_activate_required'    => _n_noop(
			'The following required plugin is currently inactive: %1$s.',
			'The following required plugins are currently inactive: %1$s.',
			'tgmpa'
		),
		'notice_can_activate_recommended' => _n_noop(
			'The following recommended plugin is currently inactive: %1$s.',
			'The following recommended plugins are currently inactive: %1$s.',
			'tgmpa'
		),
		'notice_cannot_activate'          => _n_noop(
			'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
			'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
			'tgmpa'
		),
		'install_link'                    => _n_noop(
			'Begin installing plugin',
			'Begin installing plugins',
			'tgmpa'
		),
		'update_link'                     => _n_noop(
			'Begin updating plugin',
			'Begin updating plugins',
			'tgmpa'
		),
		'activate_link'                   => _n_noop(
			'Begin activating plugin',
			'Begin activating plugins',
			'tgmpa'
		),
		'return'                          => esc_html__( 'Return to Required Plugins Installer', 'tgmpa' ),
		'dashboard'                       => esc_html__( 'Return to the dashboard', 'tgmpa' ),
		'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'tgmpa' ),
		'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'tgmpa' ),
		'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'tgmpa' ),
		'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'tgmpa' ),
		'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'tgmpa' ),
		'dismiss'                         => esc_html__( 'Dismiss this notice', 'tgmpa' ),
		'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'tgmpa' )
	);

	$theme_text_domain = 'newmagz';

	$config = array(
		'domain' => 'newmagz',
		'default_path' => '',
		'parent_menu_slug' => 'themes.php',
		'parent_url_slug' => 'themes.php',
		'menu' => 'install-plugins',
		'has_notices' => true,
		'is_automatic' => true,
		'message' => '',
		'strings' => $string
	);

	tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'warrior_required_plugins');

function detect_mobile()
{
    // Source: http://detectmobilebrowsers.com/
    // Last update: 15 Jan 2016
    // Remove |android|ipad|playbook|silk from the first regexp to remove tablet (Android tablets, iPads, Kindle Fires and PlayBooks) detection
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    //if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|android|playbook|silk|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)))
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))    	
        return true;
    else
        return false;
}

// get geo location
function get_geoIP()
{
    $country_code = '';
    // if (isset($_SERVER['HTTP_CF_IPCOUNTRY'])) {
    //     $country_code = $_SERVER['HTTP_CF_IPCOUNTRY'];
    // } elseif (isset($_SERVER['GEOIP_COUNTRY_CODE'])) {
    //     $country_code = @$_SERVER['GEOIP_COUNTRY_CODE'];
    // } else {
    //     $country_code = @file_get_contents('http://api.hostip.info/country.php?ip=' . $_SERVER['REMOTE_ADDR']);
    // }
    $country_code = 'SG';
    return $country_code;
}

function get_country_code() {	
	// if($_SERVER["HTTP_CF_CONNECTING_IP"])
	// 	$location_json = file_get_contents('http://freegeoip.net/json/'.$_SERVER["HTTP_CF_CONNECTING_IP"]);
	// else
	// 	$location_json = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
	
	// if (isset($location_json)) {
	// 	$location_obj = json_decode($location_json);
	// 	$country_code = $location_obj->country_code;
	// 	return $country_code;
	// }
	// else{
	// 	return $country_code = 'Unknown';
	// }
	$country_code = 'SG';
}

/*replace tripzilla.sg or tripzilla.my based on geoIP*/
add_filter( 'the_content', 'cn_nf_url_parse');

function cn_nf_url_parse( $content ) {
    $country_code = get_geoIP();        
    switch ($country_code) {
    case 'SG':
        $country_url = 'tripzilla.sg/';
        break;
    case 'MY':
        $country_url = 'tripzilla.my/';
        break;
    case 'VN':
        $country_url = 'tripzilla.vn/';
        break;
    case 'PH':
        $country_url = 'tripzilla.ph/';
        break;
    default:
        $country_url = 'tripzilla.sg/';
        break;
    }
    $country_url = 'tripzilla.sg/';
    preg_match_all('#<a href="(.*?)".*?>#ims', $content, $matches);
    $srcUrl = 'http://tz_location/';
        if( !empty($matches) ) {
            foreach ($matches[1] as $k => $v) {
                $url = $matches[1][$k];             
                $pos = strpos($url,$srcUrl);
                if ($pos !== false) {           
                    $content = str_replace($srcUrl, 'http://'.$country_url, $content);
                }
            }
        }

       
    $srcUrl = 'http://flyzilla.com';
        if( !empty($matches) ) {
            foreach ($matches[1] as $k => $v) {
                $url = $matches[1][$k];             
                $pos = strpos($url,$srcUrl);
                if ($pos !== false) {           
                    $content = str_replace($srcUrl, 'https://flyzilla.com', $content);
                }
            }
        }

    preg_match_all('#iframe src="(.*?)"#ims', $content, $matches);    
    $srcUrl = 'http://flyzilla.com';
        if( !empty($matches) ) {
            foreach ($matches[1] as $k => $v) {
                $url = $matches[1][$k];             
                $pos = strpos($url,$srcUrl);
                if ($pos !== false) {           
                    $content = str_replace($srcUrl, 'https://flyzilla.com', $content);
                }
            }
        }

    $check_mobile = detect_mobile();
    if ($check_mobile == 'true') {
        preg_match_all('#<img .*? src="http://static.tripzilla.com/(.*?)".*?>#ims', $content, $t_static);
        $replaceImg = '_300x.jpg';
        if (!empty($t_static)) {
            foreach ($t_static[1] as $k => $v) {
                $oriImg = '_620x.jpg';
                $content = str_replace($oriImg, $replaceImg, $content);
                $content = preg_replace('#width=".*?"#ims', 'width=100%', $content);
                $content = preg_replace('#height=".*?"#ims', '', $content);
            }
        }
    }        
    return $content;
}

function keyword_dictionary($filter_key){
	  switch ($filter_key) {
	    case 'korea':
	      $filter_key = 'south korea';
	      break;
	    case 'america':
	      $filter_key = 'USA';
	      break;
	    case 'us':
	      $filter_key = 'USA';
	      break;
	    case 'united states of america':
	      $filter_key = 'USA';
	      break;
	    case 'united states':
	      $filter_key = 'USA';
	      break;
	    case 'melaka':
	      $filter_key = 'Malacca';
	      break;
	    case 'pulau langkawi':
	      $filter_key = 'langkawi';
	      break;
	    case 'pulau redang':
	      $filter_key = 'pulau redang';
	      break;
	    case 'arab':
	      $filter_key = 'Saudi Arabia';
	      break;
	    case 'hongkong':
	      $filter_key = 'hong Kong';
	      break;
	    case 'hk':
	      $filter_key = 'hong Kong';
	      break;
	    case 'philippine':
	      $filter_key = 'philippines';
	      break;
	    case 'phillipine':
	      $filter_key = 'philippines';
	      break;
	    case 'philipine':
	      $filter_key = 'philippines';
	      break;
	    case 'bkk':
	      $filter_key = 'bangkok';
	      break;
	    case 'la':
	      $filter_key = 'los angeles';
	      break;
	    case 'l.a':
	      $filter_key = 'los angeles';
	      break;
	    case 'bkk':
	      $filter_key = 'bangkok';
	      break;
	    case 'aus':
	      $filter_key = 'australia';
	      break;
	    case 'mecca':
	      $filter_key = 'makkah';
	      break;
	    case 'mekkah':
	      $filter_key = 'makkah';
	      break;
	    case 'uae':
	      $filter_key = 'united arab emirates';
	      break;
	    case 'uk':
	      $filter_key = 'united kingdom';
	      break;
	    case 'jeju':
	      $filter_key = 'jeju island';
	      break;
	    case 'mount bromo':
	      $filter_key = 'mt bromo';
	      break;
	    case 'macao':
	      $filter_key = 'macau';
	      break;
	    case 'netherland':
	      $filter_key = 'netherlands';
	      break;
	    case 'burma':
	      $filter_key = 'myanmar';
	      break;
	    case 'combodia':
	      $filter_key = 'cambodia';
	      break;
	    case 'hang zhou':
	      $filter_key = 'hangzhou';
	      break;
	    case 'holland':
	      $filter_key = 'netherlands';
	      break;
	    case 'mekkah':
	      $filter_key = 'makkah';
	      break;
	    case 'kl':
	      $filter_key = 'kuala lumpur';
	      break;
	    default:
	      $filter_key = $filter_key;
	      break;
	  }
  
  return $filter_key;
}
//Creating Shortcode
function fzPrice_fn( $atts, $content = null ) {
   return '<span id="'.do_shortcode($content).'" class="fz_roundtrip" style="display:none;">'.do_shortcode($content).'</span>';
}
add_shortcode('fzPrice', 'fzPrice_fn');

function fzPriceBlock_fn( $atts, $content = null ) {
   return '<span id="'.do_shortcode($content).'" class="fz_roundtrip" data-template="block" style="display:none;">'.do_shortcode($content).'</span>';
}
add_shortcode('fzPriceBlock', 'fzPriceBlock_fn');

// add_filter( 'the_content', 'google_ads_parse');

// function google_ads_parse($content){
// 		$paragraphNumber = array('3','9');
// 		$adCode = '<div style="clear:both"></div>
// 		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
// 					<ins class="adsbygoogle"
// 					     style="display:block"
// 					     data-ad-client="ca-pub-2847245452106876"
// 					     data-ad-slot="6390808076"
// 					     data-ad-format="auto"></ins>
// 					<script>
// 					(adsbygoogle = window.adsbygoogle || []).push({});
// 					</script>
// 					<div style="clear:both"></div>';
// 		$content = insertAdAfterParagraph($adCode, $paragraphNumber , $content);
// 		return $content;
// }
// function insertAdAfterParagraph( $insertion, $paragraph_id, $content ) {
// 		$closing_p = '</p>';
// 		$paragraphs = explode( $closing_p, $content );
// 		$paragraph_id_for_desktop = $paragraph_id[0];
// 		$check_mobile = detect_mobile();
// 		if ($check_mobile == true) {
// 			foreach ($paragraphs as $index => $paragraph) {
// 				// Only add closing tag to non-empty paragraphs
// 				if ( trim( $paragraph ) ) {
// 					// Adding closing markup now, rather than at implode, means insertion
// 					// is outside of the paragraph markup, and not just inside of it.
// 					$paragraphs[$index] .= $closing_p;
// 				}
// 				if (in_array($index + 1, $paragraph_id)) {
// 					$paragraphs[$index] .= '<div class="google_ads_mobile" style="clear:both;float:left;width:100%;margin:0 0 20px 0;">'.$insertion.'</div>';
// 				}
// 			}
// 		}
// 		if ($check_mobile == false) {
// 			foreach ($paragraphs as $index => $paragraph) {
// 				// Only add closing tag to non-empty paragraphs
// 				if ( trim( $paragraph ) ) {					
// 					$paragraphs[$index] .= $closing_p;
// 				}
// 				if ($paragraph_id_for_desktop == $index + 1) {
// 					$paragraphs[$index] .= '<div class="google_ads_mobile" style="clear:both;float:left;width:100%;margin:0 0 20px 0;">'.$insertion.'</div>';
// 				}
// 			}	
// 		}		
// 		return implode( '', $paragraphs );
// 	}

