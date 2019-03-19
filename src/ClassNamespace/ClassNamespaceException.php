<?php declare(strict_types=1);

namespace Comquer\Reflection\ClassNamespace;

use RuntimeException;

class ClassNamespaceException extends RuntimeException
{
    public static function invalidNamespace(string $namespace): self
    {
        return new self("Provided namespace $namespace is not a valid class");
    }

    public static function missingMethod(string $namespace, string $methodName): self
    {
        return new self("Class $namespace must implement method $methodName");
    }
}