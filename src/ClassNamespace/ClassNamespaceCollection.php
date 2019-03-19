<?php declare(strict_types=1);

namespace Comquer\Reflection\ClassNamespace;

use Comquer\Collection\Collection;
use Comquer\Collection\Type;
use Comquer\Collection\UniqueIndex;

class ClassNamespaceCollection extends Collection
{
    public function __construct(array $namespaces = [])
    {
        parent::__construct(
            $namespaces,
            Type::object(ClassNamespace::class),
            new UniqueIndex(function (ClassNamespace $namespace) {
                return (string) $namespace;
            })
        );
    }
}
