<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<?php if(function_exists('ot_get_option')){
		$favicon = ot_get_option('favicon');
		$navicon = ot_get_option('navicon');
		$aboutme = ot_get_option('aboutme');
		$meta_description = ot_get_option('meta_description');
		$meta_keywords = ot_get_option('meta_keywords');
	} ?>

	<title>
		<?php
		if (function_exists('is_tag') && is_tag()) {
			single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
			elseif (is_archive()) {
				wp_title(''); echo ' Archive - '; }
				elseif (is_search()) {
					echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
					elseif (!(is_404()) && (is_single()) || (is_page())) {
						wp_title(''); echo ' - '; }
						elseif (is_404()) {
							echo 'Not Found - '; }
							if (is_home()) {
								bloginfo('name'); echo ' - '; bloginfo('description'); }
								else {
									bloginfo('name'); }
									if ($paged>1) {
										echo ' - page '. $paged; }
										?>
									</title>

									<meta name="description" content="<?php echo !empty($meta_description)?$meta_description:"" ?>" />
									<meta name="keywords" content="<?php echo !empty($meta_keywords)?$meta_keywords:"" ?>" />
									<link rel="shortcut icon" href="<?php echo !empty($favicon)?$favicon:bloginfo('stylesheet_directory')."/images/favicon.ico" ?>" type="image/x-icon" />

									<link href='http://fonts.googleapis.com/css?family=Droid+Sans:700' rel='stylesheet' type='text/css'/>
									<link href='http://fonts.googleapis.com/css?family=Arvo:400,400italic' rel='stylesheet' type='text/css'/>

									<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
									<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/icomoon/style.css">

									<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

									<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

									<?php wp_head(); ?>
									<script type="text/javascript" src="https://raw.github.com/garand/sticky/master/jquery.sticky.js"></script>
									<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
									<!--[if lte IE 7]><script src="<?php bloginfo('template_url'); ?>/icomoon/lte-ie7.js"></script><![endif]-->
								</head>

								<body <?php body_class(); ?>>
									<div id="nav">
										<ul class="nav-list">
											<li><span class="icon-search search-icon"></span></li>
											<li id="nav-list-search"><form action="<?php bloginfo('siteurl'); ?>" class="nav-list-item-btn" id="searchform" method="get"><input type="text" id="s" name="s" value="" /></form></li>
											<li><a href="<?php echo home_url() ?>" class="nav-list-item-btn"><span class="icon-home"></span>Home</a></li>
											<?php echo !empty($aboutme)?'<li><a href="'.get_permalink($aboutme).'" class="nav-list-item-btn"><span class="icon-profile"></span>About Me</a></li>':"" ?>
										</ul>
									</div>


									<div id="wrapper">
										<a href="#nav" id="nav-toggle"><img src="<?php echo !empty($navicon)?$navicon:bloginfo('stylesheet_directory')."/images/navicon.png" ?>" style="width:30px;height:30px;"></a>

										<?php if (!is_single() && !is_page()) {
											echo (is_search())?'<div id="page-wrap" style="min-height:700px;">':'<div id="page-wrap">';
											echo '	<div class="group">';
										} ?>
