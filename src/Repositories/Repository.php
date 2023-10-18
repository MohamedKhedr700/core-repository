<?php

namespace Raid\Core\Repository\Repositories;

use Exception;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\ConfigurableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\FillableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\ModelableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\ModulableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\QueryableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\TransformableInterface;
use Raid\Core\Repository\Repositories\Contracts\Concerns\UtilizableInterface;
use Raid\Core\Repository\Repositories\Contracts\RepositoryInterface;
use Raid\Core\Repository\Traits\Repository\Configurable;
use Raid\Core\Repository\Traits\Repository\Deletable;
use Raid\Core\Repository\Traits\Repository\Fillable;
use Raid\Core\Repository\Traits\Repository\Modelable;
use Raid\Core\Repository\Traits\Repository\Modulable;
use Raid\Core\Repository\Traits\Repository\Queryable;
use Raid\Core\Repository\Traits\Repository\Retrievable;
use Raid\Core\Repository\Traits\Repository\Transformable;

abstract class Repository extends CoreRepository implements RepositoryInterface, ConfigurableInterface, ModulableInterface, TransformableInterface, UtilizableInterface
{
    use Configurable;
    use Deletable;
    use Fillable;
    use Modelable;
    use Modulable;
    use Queryable;
    use Retrievable;
    use Transformable;

    /**
     * Create a new repository instance.
     */
    public function __construct($model)
    {
        $this->setModel($model);
    }

    /**
     * Determine if given id is an instance of model.
     */
    public function isModelInstance($id): bool
    {
        return $id instanceof ModelInterface;
    }

    /**
     * Checker method to search for the given method on model before throws an exception.
     *
     * @throws Exception
     */
    public function __call(string $method, mixed $arguments): mixed
    {
        if (method_exists($this->model(), $method)) {
            return $this->model()->{$method}(...$arguments);
        }

        throw new Exception(sprintf("Can't find method (%s) on %s or its model ", $method, static::class));
    }

    /**
     * Try to get the given dependency.
     *
     * @throws Exception
     */
    public function __get(string $dependency): mixed
    {
        if (! method_exists($this, $dependency)) {
            throw new Exception(sprintf(
                'Call undefined (%s) property. [Tip] try to use setModel() method in your constructor.',
                $dependency
            ));
        }

        return $this->{$dependency}();
    }
}
