<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;

return function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/index.php',
    ]);

    // this way you add a single rule
    $ecsConfig->rules([
        NoUnusedImportsFixer::class,
    ]);

    // this way you can add sets - group of rules
    $ecsConfig->sets([
        // run and fix, one by one
        SetList::SPACES,
        SetList::ARRAY,
        SetList::DOCBLOCK,
        SetList::NAMESPACES,
        SetList::COMMENTS,
        SetList::PSR_12,
    ]);

    $ecsConfig->ruleWithConfiguration(ArraySyntaxFixer::class, [
        'syntax' => 'short',
    ]);
};
