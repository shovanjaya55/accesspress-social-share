<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php 
 $apss_share_settings=array();
 if( $_POST['action']=='apss_save_options' ){
 	$share_options = array();
 	foreach ( $_POST['apss_share_settings']['share_options'] as $key=>$value ){
 		$share_options[]=$value;
 	}

	$apss_share_settings['share_options']=$share_options;
  	$apss_share_settings['social_icon_set']=$_POST['apss_share_settings']['social_icon_set'];
 	$apss_share_settings['share_positions']=$_POST['apss_share_settings']['social_share_position_options'];
	$social_networks=array();
	$apss_social_newtwork_order = explode(',',$_POST['apss_social_newtwork_order']);
	$social_network_array = array();
	foreach( $apss_social_newtwork_order as $social_network )
	  {
	      $social_network_array[$social_network] = (isset($_POST['social_networks'][$social_network]))? 1 : 0; 
	  }

 	$apss_share_settings['social_networks']=$social_network_array;
  	$apss_share_settings['twitter_username'] = stripslashes_deep($_POST['apss_share_settings']['twitter_username']);
 	$apss_share_settings['counter_enable_options'] = $_POST['apss_share_settings']['counter_enable_options'];
  	$apss_share_settings['cache_period']= is_numeric($_POST['apss_share_settings']['cache_settings']) ? $_POST['apss_share_settings']['cache_settings'] : '24' ;
 	$apss_share_settings['dialog_box_options'] = $_POST['apss_share_settings']['dialog_box_options'];
  	$apss_share_settings['footer_javascript'] = $_POST['apss_share_settings']['footer_javascript'];
  	$apss_share_settings['apss_email_subject'] = stripslashes_deep($_POST['apss_share_settings']['apss_email_subject']);
 	$apss_share_settings['apss_email_body'] = stripslashes_deep($_POST['apss_share_settings']['apss_email_body']);
 	if(!isset($apss_share_settings['apss_social_counts_transients'])){
 		$apss_share_settings['apss_social_counts_transients']=array();
 	}

	// The option already exists, so we just update it.
	update_option(APSS_SETTING_NAME, $apss_share_settings );
	$_SESSION['apss_message'] = __('Settings Saved Successfully.', APSS_TEXT_DOMAIN); 
	wp_redirect(admin_url().'admin.php?page=apss-share');
	exit;

 }

