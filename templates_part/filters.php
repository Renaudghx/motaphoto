<div class="container-select">
    <div class="container-select-cat-format">
        <ul class="select select-cat">
            <li class="init-select">Catégories <img class="filter-chevron"
                    src="<?= get_template_directory_uri(); ?>/assets/images/chevron.png" alt="fleche"></li>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => false,
                )
            );
            foreach ($terms as $term):
                ?>
                <li class="js-list-li" data-value="<?= $term->slug ?>"><?= $term->name ?></li>
            <?php endforeach; ?>
        </ul>

        <ul class="select select-format">
            <li class="init-select-format">Formats <img class="filter-chevron-format"
                    src="<?= get_template_directory_uri(); ?>/assets/images/chevron.png" alt="fleche"></li>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                )
            );
            foreach ($terms as $term):
                ?>
                <li class="js-list-li-format" data-value="<?= $term->slug ?>"><?= $term->name ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="container-select-date">
        <ul class="select select-date">
            <li class="init-select-date">Trier par<img class="filter-chevron-date"
                    src="<?= get_template_directory_uri(); ?>/assets/images/chevron.png" alt="fleche"></li>
            <li class="js-list-li-date" data-value="DESC">Ordre chronologique</li>
            <li class="js-list-li-date" data-value="ASC">Ordre chronologique inversé</li>
        </ul>
    </div>
</div>