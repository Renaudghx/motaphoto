<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<?php
$query = new WP_Query(
    array(
        'post_type' => 'photo',
        'post_per_page' => 1,
        'orderby' => 'rand',
        7
    )
);
if ($query->have_posts()):
    $query->the_post();
    if (has_post_thumbnail()): ?>
        <div class="container-hero">
            <h1>Photographe Event</h1>
            <?php
            the_post_thumbnail('2048x2048', ['style' => 'width: 100%; height: 100vh; object-fit: cover;']);
            ?>
        </div>
    <?php endif;
endif;
wp_reset_postdata();

//Filtre et tri des photos
get_template_part('templates_part/filters');

$loop = new WP_Query(
    array(
        'post_type' => 'photo',
        'post_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => 1,
    )
);
if ($loop->have_posts()): ?>
    <div class="row" id="row">
        <?php while ($loop->have_posts()):
            $loop->the_post();
            get_template_part('templates_part/card');
        endwhile; ?>
    </div>
<?php endif;
wp_reset_postdata(); ?>

<div class="div-cta home-cta">
    <a href="#!" class="cta" id="js-load-more">Charger plus</a>
</div>

<?php get_footer(); ?>