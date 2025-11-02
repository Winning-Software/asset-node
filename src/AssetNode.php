<?php

declare(strict_types=1);

namespace CloudBase\AssetNode;

use Latte\CompileException;
use Latte\Compiler\Nodes\Php\ExpressionNode;
use Latte\Compiler\Nodes\StatementNode;
use Latte\Compiler\PrintContext;
use Latte\Compiler\Tag;

final class AssetNode extends StatementNode
{
    public ExpressionNode $path;

    /**
     * @throws CompileException
     */
    public static function create(Tag $tag): self
    {
        $tag->expectArguments();
        $node = new self();
        $node->path = $tag->parser->parseExpression();

        return $node;
    }

    public function print(PrintContext $context): string
    {
        return $context->format(
            <<<'PHP'
$assetPath = %node;
if (str_ends_with($assetPath, '.css')) {
    echo '<link rel="stylesheet" type="text/css" href="/assets/' . $assetPath . '" />';
} elseif (str_ends_with($assetPath, '.js')) {
    echo '<script src="/assets/' . $assetPath . '"></script>';
} else {
    echo '<link rel="stylesheet" type="text/css" href="/assets/' . $assetPath . '.css" />';
}
PHP,
            $this->path
        );
    }

    public function &getIterator(): \Generator
    {
        yield $this->path;
    }
}
