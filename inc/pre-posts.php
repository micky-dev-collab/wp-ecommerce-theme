<?php

/**
 * Custom Query Modifications for WooCommerce.
 *
 * This file contains functions to modify the main WordPress query
 * to filter WooCommerce products on the front page based on URL parameters.
 */

/**
 * Modifies the main query to filter products by category and set other defaults.
 *
 * This function is hooked into `pre_get_posts` and runs before the posts are fetched.
 * It targets the main query on the front page to apply specific WooCommerce filters.
 *
 * @param WP_Query $query The main query object by reference.
 */
add_action('pre_get_posts', function ($query) {

    $category = get_query_var('category');
    $min_discount = (int) get_query_var('discount', 0);

    // Ensure the query modifications only apply to the main loop on the front and shop end of the site.
    if ((!is_admin() && $query->is_main_query())  && (is_shop() || is_front_page())) {

        // Get the value of the 'category' custom query variable from the URL.

        // If a category slug is present, build a taxonomy query to filter products.
        if (!empty($category)) {

            $tax_query = $query->get('tax_query') ?: [];

            $tax_query[] =
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $category,
                ];

            // Apply the taxonomy filter to the query.
            $query->set('tax_query', $tax_query);
        }
        // Always set the post type to 'product' for the main query on the front page.
        $query->set('post_type', 'product');

        // Always set the number of products to display per page to 20.
        $query->set('posts_per_page', 20);

        if ($min_discount > 0) {

            $meta_query = $query->get("meta_query") ?: [];

            $meta_query[] = [
                'key' => '_sale_price',
                'compare' => '>',
                'value' => 0,
                'type' => 'NUMERIC',
            ];

            $meta_query[] = [
                'key' => '_regular_price',
                'compare' => '>',
                'value' => 0,
                'type' => 'NUMERIC',

            ];

            $query->set('meta_query', $meta_query);

            // This part will filter in SQL to get only products where the percentage is >= min_discount
            add_filter('posts_where', function ($where) use ($min_discount) {
                global $wpdb;
                $where .= $wpdb->prepare(
                    " AND ( ( (meta_regular.meta_value - meta_sale.meta_value) / meta_regular.meta_value ) * 100 ) >= %f ",
                    $min_discount
                );
                return $where;
            });

            // Join the regular and sale price meta so we can use them in the WHERE clause
            add_filter('posts_join', function ($join) {
                global $wpdb;
                $join .= " 
                                LEFT JOIN {$wpdb->postmeta} AS meta_regular 
                                    ON ({$wpdb->posts}.ID = meta_regular.post_id AND meta_regular.meta_key = '_regular_price')
                                LEFT JOIN {$wpdb->postmeta} AS meta_sale 
                                    ON ({$wpdb->posts}.ID = meta_sale.post_id AND meta_sale.meta_key = '_sale_price')
                            ";
                return $join;
            });
        };
    }
});


/**
 * Registers a custom query variable to be recognized by WordPress.
 *
 * This function is hooked into `query_vars` and allows WordPress to handle
 * the `?category=` URL parameter for the front-end query.
 *
 * @param array $vars The array of public query variables.
 * @return array The filtered array with our custom variable.
 */
add_filter('query_vars', function ($vars) {

    // Add  custom 'category' and 'discount' query variable if it doesn't already exist.
    if (!in_array('category', $vars, true)) $vars[] = 'category';
    if (!in_array('discount', $vars, true)) $vars[] = 'discount';

    // Return the updated list of query variables.
    return $vars;
});
