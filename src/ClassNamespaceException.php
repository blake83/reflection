<?php declare(strict_types=1);

namespace Comquer\Reflection;

use RuntimeException;

class ClassNamespaceException extends RuntimeException
{
    public static function invalidNamespace(string $namespace): self
    {
        return new self("Provided namespace $namespace is not a valid class");
    }
}