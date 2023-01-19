<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['name']) || trim($_POST['name']) == '') {
        $errors[] = 'name';
    }

    if (!isset($_POST['review']) || trim($_POST['review']) == '') {
        $errors[] = 'review';
    }

    if (count($errors) == 0) {
        $data = array(
            'comment_post_ID' => $_POST['product'],
            'comment_author' => trim($_POST['name']),
            'comment_content' => trim($_POST['review']),
            'comment_type' => 'review',
            'comment_date' => date("Y-m-d H:i:s"),
            'comment_approved' => 1, // use 1 for approved
        );

        $comment_id = wp_insert_comment($data); // insert comment
        update_comment_meta($comment_id, 'rating', 5);

        wp_redirect('edit.php?post_type=product&page=product-reviews');
    }
}

// Get products for select
$products = wc_get_products([
    'status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
    'limit' => -1,
]);
?>

<div class="wrap">
    <h1>
        <?php esc_attr_e('Nieuwe beoordeling toevoegen', 'WpAdminStyle'); ?>
    </h1>

    <form method="post">
        <div id="poststuff" class="tw-flex tw-flex-col tw-gap-5">

            <div class="tw-flex tw-flex-col tw-gap-1">
                <strong>Product</strong>
                <select name="product" id="product">
                    <?php
                    foreach ($products as $product) {
                        echo '<option value="' . $product->id . '">' . $product->name . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="tw-flex tw-flex-col tw-gap-1">
                <strong>Naam</strong>
                <input type="text" id="name" name="name" class="regular-text" />
                <?php
                if (in_array('name', $errors)) {
                    echo '<p class="tw-text-xs tw-text-red-700">Geef een naam op</p>';
                }
                ?>
            </div>

            <!-- <div class="tw-flex tw-flex-col tw-gap-1">
            <strong>E-mail</strong>
            <input type="text" class="regular-text" />
            <p class="tw-text-xs tw-text-grey-500">
                Voer een nieuw e-mailadres in om een (verborgen) e-mail adres aan te maken voor een gebruiker. Geef een
                bestaand e-mailadres om een reactie onder de naam van een bestaande gebruiker te plaatsen.
            </p>
        </div> -->

            <div class="tw-flex tw-flex-col tw-gap-1">
                <strong>Review</strong>
                <textarea id="review" name="review" cols="80" rows="10" class="large-text"></textarea>
                <?php
                if (in_array('review', $errors)) {
                    echo '<p class="tw-text-xs tw-text-red-700">Geef een review op</p>';
                }
                ?>
            </div>

            <p>
                <input type="submit" name="submit" id="submit" class="button button-primary"
                    value="Beoordeling toevoegen">
            </p>
        </div>
    </form>
</div>