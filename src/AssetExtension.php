<?php

declare(strict_types=1);

namespace CloudBase\AssetNode;

use Latte\Extension;

class AssetExtension extends Extension
{
    public function getTags(): array
    {
        return [
            'asset' => [AssetNode::class, 'create'],
        ];
    }
}
