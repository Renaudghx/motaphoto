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
    )
);
if ($query->have_posts()):
    $query->the_post();
    if (has_post_thumbnail()): ?>
        <div class="container-hero">
            <h1>Photographe Event</h1>
            <?php
            the_post_thumbnail('', ['style' => 'width: 100%; height: 100vh; object-fit: cover;']);
            ?>
        </div>
    <?php endif;
endif;
wp_reset_postdata();

$loop = new WP_Query(
    array(
        'post_type' => 'photo',
        'post_per_page' => 12,
        'orderby' => 'date'
    )
);
if ($loop->have_posts()): ?>
    <div class="row">
        <?php while ($loop->have_posts()):
            $loop->the_post(); ?>
            <div class="card-photo">
                <?php the_post_thumbnail('large', [
                    'class' => 'card-img-top', 
                    'style' => 'height: 34.4vw; max-height: 495px; width: 100%; object-fit:cover;'
                ]); 
                get_template_part('templates_part/photo_overlay');?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<div class="div-cta home-cta" type="button">
    <button class="cta">Charger plus</button>
</div>

<?php get_footer(); ?>