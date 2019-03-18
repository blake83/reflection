<?php declare(strict_types=1);

namespace Comquer\Reflection;

use RuntimeException;

class ClassNamespaceException extends RuntimeException
{
    public static function invalidNamespace(string $namespace): self
    {
        return new self("Provided namespace $namespace is not a valid class");
    }

    public static function missingInterface(ClassNamespace $class, ClassNamespace $interface): self
    {

    }

    public static function missingMethod(ClassNamespace $class, string $method): self
    {

    }
}