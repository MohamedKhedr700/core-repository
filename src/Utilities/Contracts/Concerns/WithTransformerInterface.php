<?php

namespace Raid\Core\Repository\Utilities\Contracts\Concerns;

interface WithTransformerInterface
{
    /**
     * Get repository transformer class.
     */
    public static function getTransformer(): ?string;
}
