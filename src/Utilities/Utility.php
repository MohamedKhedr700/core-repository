<?php

namespace Raid\Core\Repository\Utilities;

use Raid\Core\Repository\Traits\Utility\Translatable;
use Raid\Core\Repository\Traits\Utility\WithActions;
use Raid\Core\Repository\Traits\Utility\WithAuthenticator;
use Raid\Core\Repository\Traits\Utility\WithConfig;
use Raid\Core\Repository\Traits\Utility\WithEvents;
use Raid\Core\Repository\Traits\Utility\WithGates;
use Raid\Core\Repository\Traits\Utility\WithModule;
use Raid\Core\Repository\Traits\Utility\WithRepository;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithActionInterface;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithAuthenticatorInterface;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithConfigInterface;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithEventInterface;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithGateInterface;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithModuleInterface;
use Raid\Core\Repository\Utilities\Contracts\Concerns\WithRepositoryInterface;
use Raid\Core\Repository\Utilities\Contracts\UtilityInterface;

abstract class Utility implements UtilityInterface, WithActionInterface, WithAuthenticatorInterface, WithConfigInterface, WithEventInterface, WithGateInterface, WithModuleInterface, WithRepositoryInterface
{
    use Translatable;
    use WithActions;
    use WithAuthenticator;
    use WithConfig;
    use WithEvents;
    use WithGates;
    use WithModule;
    use WithRepository;

    /**
     * {@inheritdoc}
     */
    public static function trans(string $key, array $replace = [], string $locale = null): ?string
    {
        $key = static::module().'::'.$key;

        return static::translate($key, $replace, $locale);
    }
}
