<?php

namespace Raid\Core\Repository\Transformers;

use League\Fractal\TransformerAbstract;
use Raid\Core\Repository\Transformers\Contracts\TransformerInterface;

abstract class Transformer extends TransformerAbstract implements TransformerInterface
{
    /**
     * {@inheritdoc}
     */
    protected array $availableIncludes = [];

    /**
     * {@inheritdoc}
     */
    protected array $defaultIncludes = [];
}
