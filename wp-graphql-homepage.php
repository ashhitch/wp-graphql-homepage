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

use WPGraphQL\AppContext;
use WPGraphQL\Data\DataSource;

add_action( 'graphql_register_types', function() {

	register_graphql_field( 'RootQuery', 'homepage', [
		'type' => 'Page',
		'description' => __( 'Returns the homepage', 'wp-graphql-homepage' ),
		'resolve' => function($item, array $args, AppContext $context) {
      $page_on_front = get_option( 'page_on_front', 0 );
      
			if ($page_on_front == 0 ) {
        return null;
      }

			return  DataSource::resolve_post_object( $page_on_front, $context );
		},
	]);

	register_graphql_field( 'RootQuery', 'pageForPosts', [
		'type' => 'Page',
		'description' => __( 'Returns the page for posts', 'wp-graphql-homepage' ),
		'resolve' => function($item, array $args, AppContext $context) {
      $page_for_posts = get_option( 'page_for_posts', 0 );
      
			if ($page_for_posts == 0 ) {
        return null;
      }

			return DataSource::resolve_post_object( $page_for_posts, $context );
		},
	]);

} );