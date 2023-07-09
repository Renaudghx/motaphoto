<div class="photo-overlay">
    <div class="div-sign-full-screen">
        <img class="sign-full-screen" src="<?= get_template_directory_uri(); ?>/assets/images/sign_full_screen.png"
            alt="">
    </div>
    <a class="a-oeil" href="<?php the_permalink() ?>">
        <img class="oeil" src="<?= get_template_directory_uri(); ?>/assets/images/Icon_eye.png" alt="oeil">
    </a>
    <div class="container-photo-hover-description">
        <div class="hover-photo-description">
            <?= get_field('reference') ?>
        </div>
        <div class="hover-photo-description">
            <?php taxonomy_get_the_terms('categorie'); ?>
        </div>
    </div>
</div>
<a class="overlay-mobile" href="<?php the_permalink() ?>"></a>