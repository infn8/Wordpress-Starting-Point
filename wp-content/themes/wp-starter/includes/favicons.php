<?php 
function theme_favicons(){
	$differentAdmin = true;
	$favicon_path = trailingslashit(get_template_directory_uri()) . "favicons/";
	if ($differentAdmin && is_admin()) {
		$favicon_path .= "admin/";
	} ?>
	<link rel="shortcut icon" href="<?php echo $favicon_path; ?>favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon_path; ?>apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon_path; ?>apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon_path; ?>apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $favicon_path; ?>apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $favicon_path; ?>apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_path; ?>apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon_path; ?>apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon_path; ?>apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_path; ?>apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo $favicon_path; ?>favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo $favicon_path; ?>mstile-144x144.png">
	<meta name="msapplication-config" content="<?php echo $favicon_path; ?>browserconfig.xml">
<?php 

}
add_action( 'wp_head', "theme_favicons");
add_action( 'admin_head', "theme_favicons");

