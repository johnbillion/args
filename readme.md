# Args

Don't you hate it when a function or method in WordPress accepts its arguments as an array and you never remember the names of the arguments and the possible values for each?

```php
$query = new WP_Query( [
	'post_type'          => 'post',
	'category_something' => 'does this accept an integer or a string?',
	'number_of_...errr'
] );
```

This library provides well-documented classes which represent some of the array-type parameters that are used in WordPress. Using these classes at the point where you're constructing the arguments to pass into a WordPress function means you get familiar autocompletion and intellisense in your code editor, and strict typing thanks to the behaviour of the new typed properties feature in PHP 7.4.

![](assets/screenshot.png)

## Usage

```php
$args = new \Args\WP_Query;

$args->tag = 'amazing';
$args->posts_per_page = 100;

$query = new \WP_Query( $args->toArray() );
```

```php
$args = new \Args\get_posts;

$args->numberposts = 25;
$args->suppress_filters = false;

$posts = get_posts( $args->toArray() );
```

## Do you still like arrays?

```php
$argsMeta = \Args\WP_Query::meta();

$args = [
    $argsMeta->post_type     => 'post',
    $argsMeta->category_name => 'add a string here',
];

$query = new \WP_Query( \Args\WP_Query::create($args)->toArray() );
```

```php
$argsMeta = \Args\get_posts::meta();

$args = [
    $argsMeta->numberposts => 25,
    $argsMeta->suppress_filters => false,
];

$posts = get_posts( \Args\get_posts::create( $args )->toArray() );
```

## What's Provided

* `\Args\WP_Query` for the `WP_Query` class constructor
* `\Args\get_posts` for the `get_posts()` function

These classes are generated directly from the parameter hash notation in WordPress core. I'll be working on a partly automated process for creating these at some point. I need to give some more thought on how best to name these classes and how best to handle functions that accept multiple paramters where one or more is an args array.

## Types Checks

All @property phpdoc of the class will be type checked. If you pass a value of the wrong type to an argument that is typed, you'll get a fatal error. No more mystery bugs.

## Requirements

* PHP 7.0+

## Installation

```
composer require johnbillion/args
```

## But Why?

I have a name for these array-type parameters for passing arguments. I call them *Stockholm Parameters*. We've gotten so used to using them that we forget what a terrible design pattern it is. This library exists to work around the immediate issue without rearchitecting the whole of WordPress.
