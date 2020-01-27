<!doctype html>
<html class="no-js" lang="en">
<head>
<!--
	Created and developed by Ervandra Halim <ervandra.halim@gmail.com>
-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Ervandra Halim">
	<link rel="author" href="https://plus.google.com/u/0/110270446180309877178">

	<link rel="shortcut icon" href="<?php echo esc_url(home_url('/')); ?>favicon.ico"/>

    <meta name="theme-color" content="#045f8c">

	<?php add_action('wp_head', 'vahn_styles',5);?>
	<?php add_action('wp_enqueue_scripts', 'vahn_scripts');?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WK5B934"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->