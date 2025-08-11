<?php
function render_products($parent_id = 0, $level = 0, $wrap_in_parent = false, $category = null)
{
    $categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'parent' => $parent_id
    ]);

    if (empty($categories) || is_wp_error($categories)) {
        return;
    };
    if ($wrap_in_parent): ?>
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

                <?php
            endif;
            foreach ($categories as $category) { ?>
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
                render_products($category->term_id, $level + 1, $wrap_in_parent = true, $category);
            };
            if ($wrap_in_parent):
                ?>
                </ul>
            </div>
        </li>
    <?php
            endif;
        };

        function categories_html()
        {
            ob_start(); ?>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
            <?php
            render_products();
            ?>
        </ul>
    </div>
    <?php

            return ob_get_clean();
        };


        function render_product_cateogories($parent_id = 0, $level = 0)
        {
            $categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
                'parent' => $parent_id
            ]);

            if ($level === 5) return;


            foreach ($categories as $category) {
                $children = get_terms([
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'parent' => $category->term_id,
                ]);

                $has_children = !empty($children) && !is_wp_error($children);
                if ($has_children) {
    ?>
            <!-- This block is for parent categories that have children -->
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
                    <!-- Recursive call to render the child categories -->
                    <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                        <?php render_product_cateogories($category->term_id, ++$level); ?>
                    </ul>
                </div>
            </li>
        <?php
                } else {
        ?>
            <!-- This block is for categories that do not have children -->
            <li class="nav-item border-dashed active">
                <a href="<?php echo home_url('/'); ?>?category=<?php echo esc_attr($category->slug); ?>"
                    class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#<?php echo esc_attr($category->slug); ?>"></use>
                    </svg>
                    <span><?php echo esc_html($category->name); ?></span>
                </a>
            </li>
<?php                 }
            }
        }
