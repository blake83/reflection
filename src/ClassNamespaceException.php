<?php declare(strict_types=1);

namespace Comquer\Reflection;

use RuntimeException;

class ClassNamespaceException extends RuntimeException
{
    public static function invalidNamespace(string $class): self
    {

    }

    public static function missingInterface(ClassNamespace $class, ClassNamespace $interface): self
    {

    }

    public static function missingMethod(ClassNamespace $class, string $method): self
    {

    }
}