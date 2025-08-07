<?php

/**
 * Custom Query Modifications for WooCommerce
 *
 * This file contains functions to modify the main WordPress query
 * to filter WooCommerce products on the front page based on URL parameters.
 */

// This action hook fires before the main query is executed.
// It's the ideal place to modify the query variables before posts are fetched.
add_action('pre_get_posts', function ($query) {

    // Conditional checks to ensure we only modify the query in the correct context.
    // 1. !is_admin(): Prevents this code from running in the WordPress admin area.
    // 2. $query->is_main_query(): Ensures we are only targeting the primary query on the page.
    // 3. is_front_page(): Limits this functionality specifically to the site's homepage.
    if (!is_admin() && $query->is_main_query() && is_front_page()) {
        // Retrieve the value of the 'category' custom query variable from the URL.
        // This variable is registered using the 'query_vars' filter below.
        $category = get_query_var('category');

        // Check if a category slug was found in the URL.
        if (!empty($category)) {
            // Construct a 'tax_query' array to filter by a specific taxonomy.
            $tax_query = [
                [
                    // The taxonomy to filter by (in this case, WooCommerce product categories).
                    'taxonomy' => 'product_cat',
                    // The field to match against the provided term (the category slug).
                    'field'    => 'slug',
                    // The term(s) to include in the query.
                    'terms'    => $category,
                ]
            ];

            // Set the 'tax_query' on the main query object to apply the filter.
            $query->set('tax_query', $tax_query);
        }
    }

    // Always set the post type to 'product' for the main query on the front page.
    $query->set('post_type', 'product');

    // Always set the number of posts per page to 20 for the main query.
    $query->set('posts_per_page', 20);
});


// This filter adds custom query variables to the list of recognized variables.
// It is crucial for making the '?category=...' URL parameter work in WordPress.
add_filter('query_vars', function ($vars) {
    // Check if our custom variable is already in the array to prevent duplicates.
    if (!in_array('category', $vars, true)) {
        // Add our custom 'category' query variable.
        $vars[] = 'category';
    }
    // Return the modified array of query variables.
    return $vars;
});
