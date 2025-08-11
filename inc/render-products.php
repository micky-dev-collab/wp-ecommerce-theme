<?php

/**
 * WooCommerce Product Template Functions
 *
 * This file contains functions for rendering product information on the frontend.
 */

// You can keep this for debugging if you need to inspect the query object.
// global $wp_query;
// error_log(print_r($wp_query, true));


/**
 * Renders a list of products in a loop.
 *
 * @param string $render_section A string to determine the rendering context (e.g., 'featured-section').
 */
function render_products($render_section)
{
    while (have_posts()) {
        the_post();

        $product = wc_get_product(get_the_ID());
?>
        <?php if ($render_section === 'featured-section'): ?>
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
 * Calculates and returns the discount percentage for a product on sale.
 *
 * @param float|string $regular_price The product's regular price.
 * @param float|string $sale_price The product's sale price.
 * @return string The formatted discount percentage, e.g., "(20%)", or an empty string.
 */
function render_product_discount($regular_price, $sale_price)
{
    // Check if both prices are set and the regular price is greater than the sale price.
    if (!empty($regular_price) && !empty($sale_price) && $regular_price > $sale_price) {
        $discount = $regular_price - $sale_price;
        $discount_percentage = ($discount / $regular_price) * 100;
        // Return the rounded percentage inside parentheses.
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
 * Renders the HTML for a single product.
 *
 * @param WC_Product $product The WooCommerce product object.
 * @return string The rendered HTML content.
 */
function insert_product($product)
{
    // Start output buffering to capture the HTML.
    ob_start();
    ?>
    <figure>
        <!-- Using get_permalink() to link to the actual product page -->
        <a href="<?php echo $product->get_permalink(); ?>" title="<?php echo $product->get_name() ?>">
            <!-- Using get_image_id() for the product image -->
            <img
                src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                alt="Product Thumbnail"
                class="tab-image" />
        </a>
    </figure>
    <div class="d-flex flex-column text-center">
        <h3 class="fs-6 fw-normal"><?php echo $product->get_name(); ?></h3>
        <div>
            <!-- This rating section is static, you would need a more complex function to render dynamic ratings. -->
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
            <!-- Displaying the stock quantity -->
            <span><?php echo $product->get_stock_quantity(); ?></span>
        </div>
        <div class="d-flex justify-content-center align-items-center gap-2">
            <!-- Displaying the regular price with a strikethrough if a sale price exists -->
            <del><?php if ($product->get_sale_price()) echo wc_price($product->get_regular_price()); ?></del>
            <!-- Displaying the current price (sale or regular) -->
            <span class="text-dark fw-semibold"><?php echo wc_price($product->get_price()); ?></span>
            <!-- Calling the completed discount function -->
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
                        <svg width="18" height="18">
                            <use xlink:href="#cart"></use>
                        </svg>
                        Add to Cart
                    </a>
                </div>
                <div class="col-2">
                    <!-- This link for adding to wishlist is static and would need to be implemented -->
                    <a
                        href="#"
                        class="btn btn-outline-dark rounded-1 p-2 fs-6">
                        <svg width="18" height="18">
                            <use xlink:href="#heart"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
    // End output buffering and return the captured HTML.
    return ob_get_clean();
}
