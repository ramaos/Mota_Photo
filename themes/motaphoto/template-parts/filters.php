<?php
//les catégorie
$categories = get_terms('categorie', ['hide_empty' => false]);
$filter_categorie = (isset($_POST['category'])) ? $_POST['category'] : '';

//  les fomrats
$formats = get_terms('format', ['hide_empty' => false]);
$filter_format = (isset($_POST['category'])) ? $_POST['category'] : '';
?>

<form id="filter">
    <div class="filter">
        <div class="filter__select">
            <select id="category-select" class="select filter__select--categorie" name="category">
                <option class="label" value="">CATÉGORIES</option>
                <?php
                foreach ($categories as $categorie) :
                    $selected = ($categorie->slug === $filter_categorie) ? 'selected' : '';
                    echo '<option class="select-categorie label" value="' . esc_attr($categorie->slug) . '" ' . $selected . '>' . esc_html($categorie->name) . '</option>';
                endforeach;
                ?>
            </select>
            <select id="format-select" class="select filter__select--format" name="format">
                <option class="label" value="">FORMATS</option>
                <?php
                foreach ($formats as $format) :
                    $selected = ($format->slug === $filter_format) ? 'selected' : '';
                    echo '<option class="select-format label" value="' . esc_attr($format->slug) . '" ' . $selected . '>' . esc_html($format->name) . '</option>';
                endforeach;
                ?>
            </select>
        </div>
        <div class="filter__tri">
            <select id="order-select" class="select filter__tri--date" name="order">
                <option class="label" value="">TRIER PAR</option>
                <option class="label" value="ASC">LES PLUS ANCIENNES</option>
                <option class="label" value="DESC">LES PLUS RÉCENTES</option>
            </select>
        </div>
    </div>
</form>

</form>
</div>