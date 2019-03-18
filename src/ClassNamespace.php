<?php declare(strict_types=1);

namespace Comquer\Reflection;

class ClassNamespace
{
    private $namespace;

    public function __construct(string $namespace)
    {
        self::validateNamespace($namespace);
        $this->namespace = $namespace;
    }

    public static function fromObject(object $object): self
    {
        return new self(get_class($object));
    }

    private static function validateNamespace(string $namespace): void
    {
        if (class_exists($namespace) === false) {
            throw ClassNamespaceException::invalidNamespace($namespace);
        }
    }

    public function __toString(): string
    {
        return $this->namespace;
    }
}
