<?php

global $wpdb;

$product_cat = $id; // $id - product category id

$query = "SELECT MIN(meta_value+0) FROM wp_postmeta
            JOIN wp_term_relationships ON wp_term_relationships.object_id = wp_postmeta.post_id
            JOIN wp_term_taxonomy ON wp_term_taxonomy.term_taxonomy_id = wp_term_relationships.term_taxonomy_id
            JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id
          WHERE wp_postmeta.meta_key = '_price' AND wp_terms.term_id = %d
          ";
          
$min_price = $wpdb->get_var( $wpdb->prepare( $query, $id ) );
