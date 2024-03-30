<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

// https://cs.symfony.com/doc/rules/
// https://cs.symfony.com/doc/ruleSets/
return (new Config())
    ->setFinder(
        (new Finder())
            ->in([
                __DIR__ . '/src',
                __DIR__ . '/tests',
            ])
            ->name('*.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true),
    )
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/.cache/php-cs-fixer.cache.json')
    ->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        '@PHPUnit84Migration:risky' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'php_unit_test_case_static_method_calls' => ['call_type' => 'self'],
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => null,
        ],
        // Environment not ready to use short functions.
        'use_arrow_functions' => false,
        'phpdoc_align' => ['align' => 'left'],
        // Make function invocation consistent, require all to be with leading `\`.
        'native_function_invocation' => ['include' => ['@all'], 'scope' => 'namespaced', 'strict' => true],
        'global_namespace_import' => ['import_classes' => true, 'import_functions' => true, 'import_constants' => true],
        // Force PSR-12 standard.
        'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'function', 'const']],
        'php_unit_test_class_requires_covers' => false,
        'php_unit_internal_class' => false,
        'blank_line_before_statement' => ['statements' => ['declare', 'include', 'include_once', 'require', 'require_once', 'return']],
        'php_unit_test_annotation' => ['style' => 'annotation'],
        'trailing_comma_in_multiline' => ['elements' => ['arrays', 'arguments', 'parameters'], 'after_heredoc' => true],
        'final_class' => true,
    ]);
