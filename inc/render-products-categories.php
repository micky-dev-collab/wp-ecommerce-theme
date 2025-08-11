<?php

/**
 * Renders a hierarchical list of WooCommerce product categories.
 *
 * This function uses recursion to display parent and child categories.
 * Categories with children are rendered as a collapsible button, while
 * categories without children are rendered as a simple link.
 *
 * @param int $parent_id The ID of the parent category to start from. Defaults to 0 for top-level categories.
 */
function render_categories($parent_id = 0, $level = 0)
{
    if ($level >= 5) return;

    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => $parent_id
    ]);

    if (is_wp_error($categories) || empty($categories)) return;

    foreach ($categories as $category) {
        // Output category
        $child_categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => $category->term_id
        ]);

        $has_children = !empty($child_categories) && !is_wp_error($child_categories);

        if ($has_children) {
?>
            <li class="nav-item border-dashed">
                <button
                    class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse-<?php echo esc_attr($category->slug); ?>"
                    aria-expanded="false">
                    <div class="d-flex gap-3">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#<?php echo esc_attr($category->slug); ?>"></use>
                        </svg>
                        <span><?php echo esc_html($category->name); ?></span>
                    </div>
                </button>
                <div class="collapse" id="collapse-<?php echo esc_attr($category->slug); ?>">
                    <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                        <?php render_categories($category->term_id, $level + 1); ?>
                    </ul>
                </div>
            </li>
        <?php
        } else {
        ?>
            <li class="nav-item border-dashed active">
                <a href="<?php echo home_url('/'); ?>?category=<?php echo esc_attr($category->slug); ?>"
                    class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#<?php echo esc_attr($category->slug); ?>"></use>
                    </svg>
                    <span><?php echo esc_html($category->name); ?></span>
                </a>
            </li>
    <?php
        }
    }
}


/**
 * Wraps the product categories list in a container using output buffering.
 *
 * @return string The complete HTML for the categories menu.
 */
function categories_html()
{
    // Start output buffering.
    ob_start(); ?>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
            <?php render_categories(); ?>
        </ul>
    </div>
<?php
    // End output buffering and return the captured HTML.
    return ob_get_clean();
}
?>