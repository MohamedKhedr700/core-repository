<?php

namespace Raid\Core\Repository\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Raid\Core\Enum\Enums\Action;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Repository\Services\Contracts\ServiceInterface;

abstract class ActionServiceOld extends Service implements ServiceInterface
{
    /**
     * The service repository.
     */
    public const REPOSITORY = '';

    /**
     * Actions to be performed.
     */
    protected array $actions = [];

    /**
     * Columns to be retrieved.
     */
    protected array $columns = ['*'];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->actions = static::repositoryClass()::actions();
    }

    /**
     * {@inheritdoc}
     */
    public static function repositoryClass(): string
    {
        return static::REPOSITORY;
    }

    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return $this->actions;
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
        $createActionClass = $this->getActionClass(Action::CREATE);

        return $createActionClass::exec($data);
    }

    /**
     * Get all resources.
     */
    public function all(array $filters): Collection
    {
        $indexActionClass = $this->getActionClass(Action::LIST);

        return $indexActionClass::exec($filters, $this->columns());
    }

    /**
     * Get paginated resources.
     */
    public function list(array $filters = []): LengthAwarePaginator
    {
        $indexActionClass = $this->getActionClass(Action::LIST);

        return $indexActionClass::exec($filters, $this->columns(), true);
    }

    /**
     * Show resource by given ID.
     */
    public function find(string $id): ModelInterface
    {
        $findActionClass = $this->getActionClass(Action::FIND);

        return $findActionClass::exec($id, $this->columns());
    }

    /**
     * Update resource.
     */
    public function update(string $id, array $data): ModelInterface|int
    {
        $updateActionClass = $this->getActionClass(Action::UPDATE);

        return $updateActionClass::exec($id, $data);
    }

    /**
     * Patch resource.
     */
    public function patch(string $id, array $data): ModelInterface|int
    {
        $patchActionClass = $this->getActionClass(Action::PATCH);

        return $patchActionClass::exec($id, $data);
    }

    /**
     * Delete resource.
     */
    public function delete(string $id): ?bool
    {
        $deleteActionClass = $this->getActionClass(Action::DELETE);

        return $deleteActionClass::exec($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getActionClass(string $action): ?string
    {
        foreach ($this->actions() as $actionClass) {
            if ($actionClass::action() !== $action) {
                continue;
            }

            return $actionClass;
        }

        return null;
    }
}
