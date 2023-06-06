<?php get_header(); ?>

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

                <!-- insertion de la miniature + flèches -->
                <div class="container-thumbnail">
                    <?php

                    next_post_link('%link', '<img class="arrow-r" src="' . get_template_directory_uri() . '/assets/images/arrow_right.png" alt="">');

                    if (get_next_post() != null) {
                        echo get_the_post_thumbnail(get_next_post(), 'thumbnail', ['style' => 'width: 81px; height: 71px; objectif-fit: cover;', 'class' => 'img-next']);
                    }

                    previous_post_link('%link', '<img class="arrow-l" src="' . get_template_directory_uri() . '/assets/images/arrow_left.png" alt="">');

                    if (get_previous_post() != null) {
                        echo get_the_post_thumbnail(get_previous_post(), 'thumbnail', ['style' => 'width: 81px; height: 71px; objectif-fit: cover;', 'class' => 'img-previous']);
                    }

                    ?>
                </div>
            </div>

        </div>
        </div>
    </section>
    <section class="photo-block">
        <?php get_template_part('templates_part/photo_block'); ?>
    </section>
<?php endif; ?>
<?php get_footer(); ?>