<?php

namespace Raid\Core\Repository\Traits\Utility;

use Illuminate\Support\Str;

trait Translatable
{
    /**
     * Translate the given key.
     */
    private static function translate(string $key, array $replace = [], string $locale = null): ?string
    {
        return trans($key, $replace, $locale);
    }

    /**
     * Translate the given message based on module given in method call.
     */
    private function translateModule(string $method, $arguments): ?string
    {
        if (! Str::startsWith($method, 'trans')) {
            return null;
        }

        $moduleName = Str::removeFirst('trans', $method);

        $fileName = array_shift($arguments);

        $key = $moduleName.'::'.$fileName;

        return static::translate($key, ...$arguments);
    }

    /**
     * Translate a message from modules dynamically.
     */
    public function __call($method, $args)
    {
        if ($result = $this->translateModule($method, $args)) {
            return $result;
        }

        return parent::__call($method, $args);
    }
}
