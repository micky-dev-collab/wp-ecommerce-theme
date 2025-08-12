<?php

/**
 * WooCommerce Product Rendering Functions.
 *
 * This file contains template functions for displaying product information on the frontend.
 */

// You can keep this for debugging if you need to inspect the query object.
// global $wp_query;
// error_log(print_r($wp_query, true));


/**
 * Renders a list of products in a WordPress loop.
 *
 * @param string $render_section Defines the HTML wrapper for the product item (e.g., 'swiper-slide' or a grid column).
 * @param int $discount_filter Optional. The minimum discount percentage a product must have to be displayed. Defaults to 0 (no filter).
 */
function render_products($render_section, $discount_filter = 0)
{
    while (have_posts()) {
        the_post();

        $product = wc_get_product(get_the_ID());

?>
        <?php if ($render_section === 'swiper-slide'): ?>
            <div class="product-item swiper-slide">
                <?php
                echo insert_product($product);
                ?>
            </div>
        <?php else: ?>
            <div class="col">
                <div class="product-item">
                    <?php
                    echo insert_product($product);
                    ?>
                </div>
            </div>
        <?php endif; ?>

    <?php
    }
}


/**
 * Checks if a product's discount meets a specific percentage threshold.
 *
 * @param WC_Product $product The WooCommerce product object.
 * @param int $discount_filter The minimum required discount percentage.
 * @return bool True if the product's discount is equal to or greater than the filter, or if the filter is 0. False otherwise.
 */
function is_discount($product, $discount_filter)
{
    if ($discount_filter === 0) return true;

    if (! $product->is_on_sale()) return false;

    $regular_price = (float) $product->get_regular_price();

    $sale_price = (float)$product->get_sale_price();

    $discount = $regular_price - $sale_price;

    if ($regular_price <= 0) return false;

    $discount_percentage = ($discount / $regular_price) * 100;

    return $discount_percentage >= $discount_filter;
}


/**
 * Calculates the percentage discount and returns it as a formatted HTML badge.
 *
 * @param float|string $regular_price The product's regular price.
 * @param float|string $sale_price The product's sale price.
 * @return string The HTML for a discount badge (e.g., '20% OFF') or an empty string if there's no sale.
 */
function render_product_discount($regular_price, $sale_price)
{
    // Check if both prices are set and the regular price is greater than the sale price.
    if (!empty($regular_price) && !empty($sale_price) && $regular_price > $sale_price) {
        $discount = $regular_price - $sale_price;
        $discount_percentage = ($discount / $regular_price) * 100;
        // Start output buffering to capture the HTML badge.
        ob_start();
    ?>
        <span
            class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">
            <?php
            echo round($discount_percentage) . '% OFF';
            ?>
        </span>
    <?php
        return ob_get_clean();
    }

    // Return an empty string if there's no sale or the prices are invalid.
    return '';
}


/**
 * Generates and returns the complete HTML markup for a single product card.
 *
 * @param WC_Product $product The WooCommerce product object.
 * @return string The HTML content of the product card.
 */
function insert_product($product)
{
    // Start output buffering to capture the HTML.
    ob_start();
    ?>
    <figure>
        <a href="<?php echo $product->get_permalink(); ?>" title="<?php echo $product->get_name() ?>">
            <img
                src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                alt="Product Thumbnail"
                class="tab-image" />
        </a>
    </figure>
    <div class="d-flex flex-column text-center">
        <h3 class="fs-6 fw-normal"><?php echo $product->get_name(); ?></h3>
        <div>
            <span class="rating">
                <svg width="18" height="18" class="text-warning">
                    <use xlink:href="#star-full"></use>
                </svg>
                <svg width="18" height="18" class="text-warning">
                    <use xlink:href="#star-full"></use>
                </svg>
                <svg width="18" height="18" class="text-warning">
                    <use xlink:href="#star-full"></use>
                </svg>
                <svg width="18" height="18" class="text-warning">
                    <use xlink:href="#star-full"></use>
                </svg>
                <svg width="18" height="18" class="text-warning">
                    <use xlink:href="#star-half"></use>
                </svg>
            </span>
            <span><?php echo $product->get_stock_quantity(); ?></span>
        </div>
        <div class="d-flex justify-content-center align-items-center gap-2">
            <del><?php if ($product->get_sale_price()) echo wc_price($product->get_regular_price()); ?></del>
            <span class="text-dark fw-semibold"><?php echo wc_price($product->get_price()); ?></span>
            <?php echo render_product_discount($product->get_regular_price(), $product->get_sale_price()); ?>
        </div>
        <div class="button-area p-3 pt-0">
            <div class="row g-1 mt-2">
                <div class="col-3">
                    <input
                        type="number"
                        name="quantity"
                        class="form-control border-dark-subtle input-number quantity"
                        value="1"
                        min=1 />
                </div>
                <div class="col-7">
                    <a
                        href="<?php echo $product->add_to_cart_url(); ?>"
                        class="btn btn-primary rounded-1 p-2 fs-7 btn-cart">
                        <?php echo get_icon('cart', $fill = 'white'); ?>
                        Add to Cart
                    </a>
                </div>
                <div class="col-2">
                    <a
                        href="#"
                        class="btn btn-outline rounded-1 p-2 fs-6">
                        <?php echo get_icon('heart', $fill = 'white', $stroke = 'white'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
    // End output buffering and return the captured HTML.
    return ob_get_clean();
}
