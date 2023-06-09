<?php
$categorie = array_map(function ($term) {
    return $term->term_id;
}, get_the_terms(get_post(), 'categorie'));
$query = new WP_Query(
    array(
        'post__not_in' => [get_the_ID()],
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'orderby' => 'rand',
        'tax_query' => [
            [
                'taxonomy' => 'categorie',
                'terms' => $categorie
            ]
        ]
    )
); ?>
    <h3 class="photo-block-p">Vous aimerez aussi</h3>
    <div class="photo-apparentee">
        <?php while ($query->have_posts()):
            $query->the_post();
            ?>
            <div class="container-photo-apparentee">
                <?php the_post_thumbnail('large', [
                    'style' => 'width: 100%; height: 100%; object-fit: cover;',
                    'class' => 'js-img-lightbox'
                ]); 
                get_template_part('templates_part/photo_overlay');?>
            </div>
            <?php
        endwhile; ?>
    </div>
<?php wp_reset_postdata(); ?>
<div class="div-cta" type="button">
    <a href="//localhost/P11/motaphoto">
        <button class="cta">Toutes les photos</button>
    </a>
</div>