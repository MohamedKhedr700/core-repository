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
    public function __invoke(StorePostRequest $request, UserRepository $userRepository): JsonResponse
    {
        $post = $userRepository->create($request->validated());

        return response()->json([
            'resource' => $post,
        ]);
    }
}
```

# How to work this

Let's create our first repository,
you can use this command to create the model class.

``` bash
php artisan core:make-repository PostRepository
```

``` php
<?php

namespace App\Repositories;

use Raid\Core\Repository\Repositories\Contracts\RepositoryInterface;
use Raid\Core\Repository\Repositories\Repository;

class PostRepository extends Repository implements RepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public const UTILITY = '';
}
```

The `PostRepository` class extends the `Repository` class, and implements the `RepositoryInterface` interface.

The `Repository` class has a `UTILITY` constant, this constant is used to define the utility class for the repository.

The `Utility` class is used to define the repository utility methods.

You can use this command to create the utility class.

``` bash
php artisan core:make-utility PostUtility
```

``` php
<?php

namespace App\Utilities;

use Raid\Core\Repository\Utilities\Contracts\UtilityInterface;
use Raid\Core\Repository\Utilities\Utility;

class PostUtility extends Utility implements UtilityInterface
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

The `PostUtility` class extends the `Utility` class, and implements the `UtilityInterface` interface.

The `Utility` class has two constants, `MODULE_LOWER` and `MODULE_UPPER`.

The `MODULE_LOWER` constant is used to define the module name in lower case.

The `MODULE_UPPER` constant is used to define the module name in upper case.

#### Configure the repository

Now we need to configure the repository in the `config/repository.php` file.

``` php
    'repositories' => [
       // here we define our repositories
        \App\Repositories\PostRepository::class,
    ],
```


This will register the `PostRepository` class.

#### Configure the model

Each repository will have a configuration file,
We can define the repository config directory in the `config/repository.php` file.

``` php
'repository_config_path' => base_path('repository-config'),
```

Now we need to create the repository config file.


``` bash
Great, now we can work with our new model class.

### Fill model attributes.

- This will not save the model to the database.

``` php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $post = new Post();

        $post->fillAttribute('title', $request->get('title'));

        $post->fillAttributes([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
    }
}
```

- The `fillAttribute` method will fill the attribute value, but it will not save it to the database.

- The `fillAttributes` method will fill the attributes values, but it will not save it to the database.

<br>

### Force fill model attributes.

- This will save the model to the database.

``` php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $post = new Post();

        $post->forceFillAttribute('title', $request->get('title'));

        $post->forceFillAttributes([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
    }
}
```

- The `forceFillAttribute` method will fill the attribute value, and it will save it to the database.

- The `forceFillAttributes` method will fill the attributes values, and it will save it to the database.

### Get model attributes.

``` php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Post $post): JsonResponse
    {
        $attribute = $post->attribute('title', '');

        $attributes = $post->attributes('title', 'content');

        $hasAttribute = $post->hasAttribute('title');
    }
}
```
- The `attribute` method will return the attribute value if it exists, otherwise, it will return the default value.

- The `attributes` method will return the attributes values.

- The `hasAttribute` method will return `true` if the model has the attribute, otherwise, it will return `false`.

### Use Attribute instance

We have another method to fill the model attributes, by using the `Raid\Core\Model\Models\Attribute` class.

``` php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Raid\Core\Model\Models\Attribute;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Post $post): JsonResponse
    {
        $attribute = new Attribute();

        $attribute->attribute('title');

        $attribute->value($request->get('title'));

        $attribute->default('default title value');
        
        $attribute->forceFill(true);
        
        $post->fillAttr($attribute);

        // or to force fill the attribute
        $post->forceFillAttr($attribute);
    }
}
```

<br>

## Model Filter

We depend on **[tucker-eric/eloquentfilter](https://github.com/Tucker-Eric/EloquentFilter)** to apply model filters.

you can use this command to create the model filter class.

``` bash
php artisan core:make-model-filter PostFilter
```

``` php
<?php

namespace App\Models\ModelFilters;

use Raid\Core\Model\Models\Filter\ModelFilter;

class PostFilter extends ModelFilter
{
}
```

We need to define the `Post` model filter.

Using the `filter` property.

``` php
<?php

namespace App\Models;

use App\Models\ModelFilters\PostFilter;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Models\Model;

class Post extends Model implements ModelInterface
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [];

    /**
     * {@inheritdoc}
     */
    protected string $filter = PostFilter::class;
}
```

or define `modelFilter` method.

``` php
<?php

namespace App\Models;

use App\Models\ModelFilters\PostFilter;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Models\Model;

class Post extends Model implements ModelInterface
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [];

    /**
     * Provide model filter.
     */
    public function modelFilter(): ?string
    {
        return $this->provideFilter(PostFilter::class);
    }
}
```

Now we can use the `filter` method with our model class, and send our filters to apply it the model.

``` php
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $posts = Post::filter([
            'title' => $request->get('title'),
        ]);
    }
}
```

and in the `PostFilter` class we define our filters.

``` php
<?php

namespace App\Models\ModelFilters;

use Raid\Core\Model\Models\Filter\ModelFilter;

class PostFilter extends ModelFilter
{
    /**
     * Filter with title.
     */
    public function title(string $title): static
    {
        return $this->whereLike('title', $title);
    }
}
```

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

