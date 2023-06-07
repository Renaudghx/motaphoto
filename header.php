<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
	<!-- Delet alert favicon -->
	<link rel="shortcut icon" href="#">
</head>

<body <?php body_class(); ?>>

	<div class="header_content">
		<?php
		if (function_exists('the_custom_logo')) {
			the_custom_logo();
		}
		wp_nav_menu(['theme_location' => 'header'])
			?>
	</div>