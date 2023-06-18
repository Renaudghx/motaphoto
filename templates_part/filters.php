<form>
    <div class="container-select-cat">
        <select class="select-cat" id="js-select-cat">
            <option value="" selected>Catégories</option>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => false,
                ));
            foreach ($terms as $term):
                $term = $term->name; ?>
                <option value="<?= $term ?>"><?= $term ?></option>
            <?php endforeach;
            ?>
        </select>
    </div>
</form>