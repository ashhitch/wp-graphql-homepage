<?php
/**
 * Plugin Name:     WPGraphql Homepage
 * Plugin URI:      http://github.com/ashhitch/wp-graphql-homepage
 * Description:     A WPGraphQL Extension that adds a root query to the GraphQL schema that returns the front page
 * Author:          Ash Hitchcock
 * Author URI:      https://www.ashleyhitchcock.com
 * Text Domain:     wp-graphql-homepage
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         WP_Graphql_Homepage
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'graphql_register_types', function() {

	register_graphql_field( 'RootQuery', 'homepage', [
		'type' => 'Page',
		'description' => __( 'Returns the homepage', 'wp-graphql-homepage' ),
		'resolve' => function() {
      $page_on_front = get_option( 'page_on_front', 0 );
      
			if ($page_on_front == 0 ) {
        return null;
      }

      query_posts(array(
        'p' => $page_on_front,
        'post_type' => 'page'
      ));
      the_post();

      $homepage = $post;
      wp_reset_query();

			return $homepage;
		},
	]);

	register_graphql_field( 'RootQuery', 'pageForPosts', [
		'type' => 'Page',
		'description' => __( 'Returns the page for posts', 'wp-graphql-homepage' ),
		'resolve' => function() {
      $page_for_posts = get_option( 'page_for_posts', 0 );
      
			if ($page_for_posts == 0 ) {
        return null;
      }


      query_posts(array(
        'p' => $page_for_posts,
        'post_type' => 'page'
      ));
      the_post();

      $postPage = $post;
      wp_reset_query();

			return $postPage;
		},
	]);

} );