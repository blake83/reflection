<?php declare(strict_types=1);

namespace Comquer\Reflection\ClassName;

use Comquer\Collection\Collection;
use Comquer\Collection\Type;
use Comquer\Collection\UniqueIndex;

class ClassNameCollection extends Collection
{
    public function __construct(array $classNames = [])
    {
        parent::__construct(
            $classNames,
            Type::object(ClassName::class),
            new UniqueIndex(function (ClassName $className) {
                return (string) $className;
            })
        );
    }
}
