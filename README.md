# Kirby PHP Code Style

The shared [PHP CS Fixer](https://cs.symfony.com) code style for Kirby's PHP
repositories.

## Usage

Add a `.php-cs-fixer.dist.php` that only describes what to look at:

```php
<?php

return Kirby\PhpCs\Config::create()->setFinder(
	PhpCsFixer\Finder::create()
		->exclude('dependencies')
		->in(__DIR__)
);
```

and run it through [cpx](https://github.com/RedExplosion/cpx), which keeps
the tool and the rules out of the project's `vendor` directory:

```json
"scripts": {
	"fix": "cpx getkirby/php-cs:^0.2 fix"
}
```

`Config::create(risky: false)` leaves out the rules that can change
behaviour.

## Rule sets

| Set                  | Contents                                       |
| -------------------- | ---------------------------------------------- |
| `@Kirby/style`       | `@PSR12` plus the Kirby rules                  |
| `@Kirby/style:risky` | the above plus rules that may change behaviour |

Several rules deliberately override `@PSR12`: `declare_equal_normalize`,
`new_with_parentheses`, `ordered_class_elements` and `ordered_imports`.

Four `@PSR12` rules are switched off rather than overridden:
`statement_indentation`, `no_multiple_statements_per_line` and
`no_blank_lines_after_phpdoc` are replaced by the `Kirby/` versions,
`blank_line_after_opening_tag` is dropped along with
`linebreak_after_opening_tag`.

## Custom rules

| Rule                                    | Purpose                                                                             |
| --------------------------------------- | ----------------------------------------------------------------------------------- |
| `Kirby/class_block_separation`          | Blank line between trait imports, constants and each property block                 |
| `Kirby/fully_qualified_strict_types`    | Shortens class names, but only in namespaced files, so templates keep working       |
| `Kirby/no_blank_lines_after_phpdoc`     | As upstream, but leaves the docblock a file opens with alone                        |
| `Kirby/no_multiple_statements_per_line` | As upstream, but only for files that are nothing but PHP                            |
| `Kirby/phpdoc_no_redundant_types`       | Drops `@param` types that only repeat the native type hint, keeping the description |
| `Kirby/statement_indentation`           | As upstream, but only for files that are nothing but PHP                            |

## Tests

```
composer install
composer test
```

- `tests/fixtures` holds one `.in.php`/`.out.php` pair per case for the custom fixers alone, picked by the file name prefix (`block-`, `phpdoc-`, `shorten-`).
- `tests/integration` holds pairs that go through the whole rule set, which is where the custom rules and the upstream ones have to agree.
