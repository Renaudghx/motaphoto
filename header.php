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

<?php
function taxonomy_get_the_terms($taxonomy)
{
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    foreach ($terms as $term) {
        $term = $term->name;
    }
    echo $term;
}
?>

	<div class="header_content">
		<?php
		if (function_exists('the_custom_logo')) {
			the_custom_logo();
		}
		wp_nav_menu(['theme_location' => 'header'])
			?>
	</div>