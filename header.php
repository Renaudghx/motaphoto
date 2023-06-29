<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Site de photographies Motaphoto">
	<meta name="keywords" content="photographe, event, mariage">
	<meta name="author" content="Renaud Gheux">
	<?php wp_head(); ?>
	<!-- Delet alert favicon -->
	<link rel="shortcut icon" href="#">
	<title>Motaphoto | Photographie - Event - Mariage</title>
</head>

<body <?php body_class(); ?>>
	<div class="header_content">
		<?php
		if (function_exists('the_custom_logo')) {
			the_custom_logo();
		}
		wp_nav_menu(['theme_location' => 'header'])
			?>
		<div class="content-mobile">
			<nav class="nav-mobile" role="navigation">
				<div class="menuToggle-mobile">
					<input type="checkbox" id="checkboxMobile" />
					<span></span>
					<span></span>
					<span></span>
					<ul class="menu-mobile">
						<span class="mobile-header">
						</span>
						<li><a href="http://localhost/P11/motaphoto/">Acceuil</a></li>
						<li><a href="http://localhost/P11/motaphoto/a-propos/">à propos</a></li>
						<li><a href="#" id="js-mobile-contact">Contact</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>