<?php declare(strict_types=1);

namespace Comquer\Reflection\ClassName;

use RuntimeException;

class ClassNameException extends RuntimeException
{
    public static function classDoesNotExist(string $className) : self
    {
        return new self("Class $className does not exist");
    }

    public static function missingMethod(string $className, string $methodName): self
    {
        return new self("Class $className is expected to implement method `$methodName` but it doesn't");
    }

    public static function missingImplementation(string $className, string $interfaceName)
    {
        return new self("Class $className is expected to implement interface `$interfaceName` but it doesn't");
    }
}