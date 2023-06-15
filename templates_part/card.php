<div class="card-photo">
    <?php the_post_thumbnail('large', [
        'class' => 'card-img-top js-img-lightbox',
        'style' => 'height: 34.4vw; max-height: 495px; width: 100%; object-fit:cover;'
    ]);
    get_template_part('templates_part/photo_overlay'); ?>
</div>