<?php declare(strict_types=1);

namespace Comquer\Reflection\ClassName;

use ReflectionClass;

class ClassName
{
    /** @var string */
    private $classReflection;

    public function __construct(string $className)
    {
        try {
            $this->classReflection = new ReflectionClass($className);
        } catch (\ReflectionException $exception) {
            throw ClassNameException::classDoesNotExist($className);
        }
    }

    public function getParents() : ClassNameCollection
    {
        $parents = new ClassNameCollection();

        foreach (class_parents((string) $this) as $parent) {
            $parents->add(new self($parent));
        }

        return $parents;
    }

    public function mustHaveMethod(string $methodName) : void
    {
        if ($this->classReflection->hasMethod($methodName) === false) {
            throw ClassNameException::missingMethod((string) $this, $methodName);
        }
    }

    public function mustImplement(string $interfaceName) : void
    {
        if ($this->classReflection->implementsInterface($interfaceName) === false) {
            throw ClassNameException::missingImplementation((string) $this->classReflection, $interfaceName);
        }
    }

    public function equals(self $namespace) : bool
    {
        return (string) $this === (string) $namespace;
    }

    public function __toString() : string
    {
        return $this->classReflection->getName();
    }
}
