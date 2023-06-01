<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php $loop = new WP_Query(
    array(
        'post_type' => 'photo',
        'post_per_page' => 12,
        'orderby' => 'date'
    )
); ?>
<?php if ($loop->have_posts()): ?>
    <div class="row">
        <?php while ($loop->have_posts()):
            $loop->the_post(); ?>
            <div class="column">
                <a href="<?php the_permalink() ?>">
                    <div class="card-photo">
                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top', 'style' => 'height: auto;']) ?>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>