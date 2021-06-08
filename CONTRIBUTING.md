# Contributing

## Setup

```
composer install
```

## Generating an Args Definition

You can generate an Args definition for an array parameter of a function or method given its file name, its fully qualified symbol name, and the parameter name. The generated definition serves as a starting point and you'll need to manually correct things like union types, improve the docblock formatting, add PHPStan constraints as necessary, and generally make sure the properties are valid and correct.

The command looks like this:

```
composer generate -- --file=<file> --method=<method> --param=<param>
```

A copy of WordPress is available in `vendor/wordpress/wordpress`.

### Example

```
composer generate -- --file=vendor/wordpress/wordpress/wp-includes/class-wp-query.php --method="\WP_Query::parse_query()" --param=query
```

## Running the Tests

The tests in the `tests` directory are there mainly to check the types of the properties of a given Args definition. They're not real tests and they only test the happy path (it's not possible to ensure that a given value _cannot_ be used, for example). That said, they've allowed me to catch a few bugs so they are somewhat useful.

Running the tests:

```
composer test
```
