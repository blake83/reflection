<?php declare(strict_types=1);

namespace Comquer\ReflectionTest;

use Comquer\Reflection\ClassNamespace;
use Comquer\Reflection\ClassNamespaceException;
use Comquer\ReflectionTest\Fixture\Animal\Animal;
use Comquer\ReflectionTest\Fixture\Animal\Cat;
use Comquer\ReflectionTest\Fixture\Animal\PersianCat;
use Comquer\ReflectionTest\Fixture\SampleClass;
use Comquer\ReflectionTest\Fixture\SampleInterface;
use PHPUnit\Framework\TestCase;

class ClassNamespaceTest extends TestCase
{
    /** @test */
    function instantiate_with_valid_class_namespace()
    {
        self::assertInstanceOf(
            ClassNamespace::class,
            new ClassNamespace(SampleClass::class)
        );
    }

    /** @test */
    function cant_instantiate_with_interface_namespace()
    {
        $exception = ClassNamespaceException::invalidNamespace(SampleInterface::class);
        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());

        new ClassNamespace(SampleInterface::class);
    }

    /** @test */
    function get_parents()
    {
        $persianCatClass = new ClassNamespace(PersianCat::class);
        $parents = $persianCatClass->getParents();

        self::assertCount(2, $parents);
        self::assertTrue($parents->get(Cat::class)->equals(new ClassNamespace(Cat::class)));
        self::assertTrue($parents->get(Animal::class)->equals(new ClassNamespace(Animal::class)));
    }
}