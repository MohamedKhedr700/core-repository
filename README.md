# Core Repository Package

This package is responsible for handling all repositories in the system.

## Installation

``` bash
composer require raid/core-repository
```

## Configuration

``` bash
php artisan core:publish-repository
```


## Usage

``` php
class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(StoreUserRequest $request, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->create($request->validated());

        return response()->json([
            'resource' => $user,
        ]);
    }
}
```

# How to work this

Let's create our first repository,
you can use this command to create the model class.

``` bash
php artisan core:make-repository UserRepository
```

``` php
<?php

namespace App\Repositories;

use Raid\Core\Repository\Repositories\Contracts\RepositoryInterface;
use Raid\Core\Repository\Repositories\Repository;

class UserRepository extends Repository implements RepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public const UTILITY = '';
}
```

The `UserRepository` class extends the `Repository` class, and implements the `RepositoryInterface` interface.

The `Repository` class has a `UTILITY` constant, this constant is used to define the utility class for the repository.

The `Utility` class is used to define the repository utility methods.

You can use this command to create the utility class.

``` bash
php artisan core:make-utility UserUtility
```

``` php
<?php

namespace App\Utilities;

use Raid\Core\Repository\Utilities\Contracts\UtilityInterface;
use Raid\Core\Repository\Utilities\Utility;

class UserUtility extends Utility implements UtilityInterface
{
    /**
     * {@inheritdoc}
     */
    public const MODULE_LOWER = '';

    /**
     * {@inheritdoc}
     */
    public const MODULE_UPPER = '';
}
```

The `UserUtility` class extends the `Utility` class, and implements the `UtilityInterface` interface.

The `Utility` class has two constants, `MODULE_LOWER` and `MODULE_UPPER`.

The `MODULE_LOWER` constant is used to define the module name in lower case.

The `MODULE_UPPER` constant is used to define the module name in upper case.

#### Configure the repository

Now we need to configure the repository in the `config/repository.php` file.

``` php
'repositories' => [
   // here we define our repositories
    \App\Repositories\UserRepository::class,
],
```


This will register the `UserRepository` class.

#### Configure the model

Each repository will have a configuration file to define configuration for the repository.

We can define the repository config directory in the `config/repository.php` file.

``` php
'repository_config_path' => base_path('repository-config'),
```

Now we need to create the repository config file.


``` bash
php artisan core:make-repo-config post
```

``` php
<?php

return [

    'model' => null,
];

```

You must define the model class in the `model` key.

``` php
<?php

return [

    'model' => \App\Models\Post::class,
];
```

The config file will be registered.

The repository will use the model class to perform the database operations.

<br>

And that's it.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- **[Mohamed Khedr](https://github.com/MohamedKhedr700)**

## Security

If you discover any security-related issues, please email
instead of using the issue tracker.

## About Raid

Raid is a PHP framework created by **[Mohamed Khedr](https://github.com/MohamedKhedr700)**,
and it is maintained by **[Mohamed Khedr](https://github.com/MohamedKhedr700)**.

## Support Raid

Raid is an MIT-licensed open-source project. It's an independent project with its ongoing development made possible.

