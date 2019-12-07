# WPGraphQl Homepage

This is an extension to the WPGraphQL plugin (https://github.com/wp-graphql/wp-graphql) to return a `Page` type of the `homepage` and `page for post` page set under the reading settings.

## Quick Install

1. Install & activate [WPGraphQL](https://www.wpgraphql.com/)
2. Clone or download the zip of this repository into your WordPress plugin directory & activate the **WP GraphQL Homepage** plugin

## Composer

```
composer require ashhitch/wp-graphql-homepage
```

> Using this plugin? I would love to see what you make with it. [@ash_hitchcock](https://twitter.com/ash_hitchcock)

## Usage

To query for the Page Data as the seo object to your query:

```
query MyQuery {
  homepage {
    pageId
    slug
    title
    content
    excerpt
    ...
  }
  pageForPosts {
    pageId
    slug
    title
    content
    excerpt
    ...
  }
}
```

## Support

[Open an issue](https://github.com/ashhitch/wp-graphql-homepage/issues)
