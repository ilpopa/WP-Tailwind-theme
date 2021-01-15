<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'leading-normal tracking-normal bg-white text-gray-900 antialiased gradient' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header>
		<?php include "template-parts/navigation.php"; ?>
	</header>
	<div id="content" class="site-content flex-grow">

		<!-- Start introduction -->
		<?php if ( is_front_page() ) : ?>
			<?php include "template-parts/hero.php"; ?>
		<!-- End introduction -->
		<?php endif; ?>

		<?php do_action( 'tailpress_content_start' ); ?>

		<main class="bg-white flex">
