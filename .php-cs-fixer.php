<?php

/**
 * PSR-12
 *
 * This format is created to help the developers to ensure that it is formatted
 * correctly. To know more, look the following link
 *
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 * @version 1.0
 */
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'storage',
        'bootstrap/cache',
        '_pipeline_tmp/',
        'vendor/',
        'packages/',
    ]);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12'                            => true,
        'array_syntax'                      => ['syntax' => 'short'],
        'concat_space'                      => ['spacing' => 'one'],
        'not_operator_with_successor_space' => true,
        'no_superfluous_elseif'             => true,
        'single_quote'                      => true,
        'operator_linebreak'                => true,
        // New rules.
        'blank_line_after_opening_tag'      => true,
        'braces'                            => true,
        'explicit_string_variable'          => true,
        'no_unused_imports'                 => true,
        'single_import_per_statement'       => false,
        'group_import'                      => true,
        'ordered_traits'                    => true,
        'ordered_interfaces'                => true,
        'combine_consecutive_unsets'        => true,
        'no_empty_comment'                  => true,
        'no_empty_phpdoc'                   => true,
        'no_trailing_whitespace_in_comment' => true,
        'align_multiline_comment'           => true,
        'no_extra_blank_lines'              => [
            'tokens' => [
                'break',
                'continue',
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
                'return',
                'square_brace_block',
                'throw',
                'use'
            ],
        ],
        'explicit_indirect_variable'               => true,
        'doctrine_annotation_indentation'          => true,
        'combine_consecutive_issets'               => true,
        'constant_case'                            => true,
        'assign_null_coalescing_to_coalesce_equal' => true, // PHP8
        'ordered_imports'                          => [
            'sort_algorithm' => 'alpha',
            'imports_order'  => [
                'const',
                'class',
                'function',
            ]
        ],
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align_single_space_minimal'
            ]
        ],
    ])
    ->setFinder($finder);
