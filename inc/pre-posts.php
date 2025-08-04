<?php
// Pre get posts edit
add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query() && is_front_page()) {
        $category = get_query_var('category');

        if (!empty($category)) {
            $query->set('post_type', 'product');

            $tax_query = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $category,
                ]
            ];

            $query->set('tax_query', $tax_query);
        }
    }
});

// Register custom query vars
add_filter('query_vars', function ($vars) {
    if (!in_array('category', $vars, true)) {
        $vars[] = 'category';
    }
    return $vars;
});
