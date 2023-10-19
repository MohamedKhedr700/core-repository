<?php

namespace Raid\Core\Repository\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Raid\Core\Enum\Enums\Action;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Repository\Services\Contracts\ActionServiceInterface;
use Raid\Core\Repository\Services\Contracts\ServiceInterface;

abstract class ActionService implements ActionServiceInterface
{
    /**
     * The service repository.
     */
    public const REPOSITORY = '';

    /**
     * Columns to be retrieved.
     */
    protected array $columns = ['*'];

    /**
     * {@inheritdoc}
     */
    public static function repository(): string
    {
        return static::REPOSITORY;
    }

    /**
     * {@inheritdoc}
     */
    public function columns(): array
    {
        return $this->columns;
    }

    /**
     * Create resource.
     */
    public function create(array $data): ModelInterface
    {
        return static::repository()::action(Action::CREATE, $data);
    }

    /**
     * Get all resources.
     */
    public function all(array $filters): Collection
    {
        return static::repository()::action(Action::LIST, $filters, $this->columns(), false);
    }

    /**
     * Get paginated resources.
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        return static::repository()::action(Action::LIST, $filters, $this->columns(), true);
    }

    /**
     * Show resource by given ID.
     */
    public function find(string|ModelInterface $id): ModelInterface
    {
        return static::repository()::action(Action::FIND, $id);
    }

    /**
     * Update resource.
     */
    public function update(string|ModelInterface $id, array $data): ModelInterface|int
    {
        return static::repository()::action(Action::UPDATE, $id, $data);
    }

    /**
     * Patch resource.
     */
    public function patch(string|ModelInterface $id, array $data): ModelInterface|int
    {
        return static::repository()::action(Action::PATCH, $id, $data);
    }

    /**
     * Delete resource.
     */
    public function delete(string|ModelInterface $id): ?bool
    {
        return static::repository()::action(Action::DELETE, $id);
    }
}
