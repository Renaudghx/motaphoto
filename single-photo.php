<?php get_header();
function taxonomy_get_the_terms($taxonomy)
{
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    foreach ($terms as $term) {
        $term = $term->name;
    }
    echo $term;
}
?>

<?php if (have_posts()): ?>
    <section class="section-post-photo">
        <div class="post-content-photo">
            <div class="post-column-left">
                <h2>
                    <?php the_title() ?>
                </h2>
                <div class="post-description">
                    <div class="single-photo-description">Référence :
                        <span id="ref-photo">
                            <?= get_field('reference'); ?>
                        </span>
                    </div>
                    <div class="single-photo-description">Catégorie :
                        <?php taxonomy_get_the_terms('categorie'); ?>
                    </div>
                    <div class="single-photo-description">Format :
                        <?php taxonomy_get_the_terms('format'); ?>
                    </div>
                    <div class="single-photo-description">Type :
                        <?= get_field('type'); ?>
                    </div>
                    <div class="single-photo-description">Année :
                        <?= get_the_date('Y'); ?>
                    </div>
                </div>
            </div>
            <div class="post-column-right">
                <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto;']) ?>
            </div>
        </div>
        <div class="post-content-contact">
            <div class="post-column-left ">
                <p>Cette photo vous intéresse ?</p>
                <button id="js-post-cta" type="button" class="post-cta cta">Contact</button>
            </div>
            <div class="post-column-right">

                <?php
                // insertion de la miniature + flèches
                $query = new WP_Query(
                    array(
                        'post__not_in' => [get_the_ID()],
                        'post_type' => 'photo',
                        'post_per_page' => 1,
                        'orderby' => 'date',
                    )
                );
                if ($query->have_posts()): ?>
                    <?php $query->the_post(); ?>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="container-thumbnail">
                            <?php 
                            the_post_thumbnail('thumbnail', ['style' => 'width: 81px; height: 71px;']); 
                            wp_reset_postdata(); ?>
                            <div class="single-arrows">
                                <?php
                                previous_post_link('%link', '<img class="arrow-l" src="' . get_template_directory_uri() . '/assets/images/arrow_left.png" alt="">');
                                next_post_link('%link', '<img class="arrow-r" src="' . get_template_directory_uri() . '/assets/images/arrow_right.png" alt="">');
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <p>Désolé, aucune photo ne correspond à cette requête</p>

            <?php endif;
                wp_reset_postdata(); ?>
        </div>
        </div>
    </section>
    <section class="photo-block">
        <?php get_template_part('templates_part/photo_block') ?>
    </section>
<?php endif; ?>
<?php get_footer(); ?>