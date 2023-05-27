<?php get_header(); ?>

<?php if (have_posts()): ?>
    <section class="section-post-photo">
        <div class="post-content-photo">
            <div class="post-column-left">
                <h1>
                    <?php the_title() ?>
                </h1>
                <div class="post-description">
                    <p class="post-taxonomie">Référence :
                        <?= get_field('reference') ?>
                    </p>
                    <p class="post-taxonomie">Catégorie :
                        <?= the_terms(get_the_ID(), 'categorie') ?>
                    </p>
                    <p class="post-taxonomie">Format :
                        <?= the_terms(get_the_ID(), 'format') ?>
                    </p>
                    <p class="post-taxonomie">Type :
                        <?= get_field('type') ?>
                    </p>
                    <p class="post-taxonomie">Année :
                        <?= get_the_date('Y') ?>
                    </p>
                </div>
            </div>
            <div class="post-column-right">
                <?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto;']) ?>
            </div>
        </div>
        <div class="post-content-contact">
            <div class="post-column-left ">
                <p>Cette photo vous intéresse ?</p>
                <button class="post-cta">Contact</button>
            </div>
            <div class="post-column-right">
            <p>Photo</p>
            </div>
        </div>
    </section>
<?php else: ?>
    <h1>Pas de photo</h1>
<?php endif; ?>

<?php get_footer(); ?>