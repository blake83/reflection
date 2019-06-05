<?php declare(strict_types=1);

namespace Comquer\ReflectionTest;

use Comquer\Reflection\ClassName\ClassName;
use Comquer\Reflection\ClassName\ClassNameException;
use Comquer\ReflectionTest\Fixture\Animal\Animal;
use Comquer\ReflectionTest\Fixture\Animal\Cat;
use Comquer\ReflectionTest\Fixture\Animal\PersianCat;
use Comquer\ReflectionTest\Fixture\Sample\SampleClass;
use PHPUnit\Framework\TestCase;

class ClassNamespaceTest extends TestCase
{
    /** @test */
    function instantiate_with_valid_class_namespace()
    {
        self::assertInstanceOf(
            ClassName::class,
            new ClassName(SampleClass::class)
        );
    }

    /** @test */
    function cant_instantiate_with_interface_namespace()
    {
        $className = 'This\ClassDoes\Not\Exist';

        $exception = ClassNameException::classDoesNotExist($className);
        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());

        new ClassName($className);
    }

    /** @test */
    function get_parents()
    {
        $persianCatClass = new ClassName(PersianCat::class);
        $parents = $persianCatClass->getParents();

        self::assertCount(2, $parents);
        self::assertTrue($parents->get(Cat::class)->equals(new ClassName(Cat::class)));
        self::assertTrue($parents->get(Animal::class)->equals(new ClassName(Animal::class)));
    }

    /** @test */
    function must_have_method()
    {
        $sampleClass = new ClassName(SampleClass::class);
        $sampleClass->mustHaveMethod('getSample');

        $exception = ClassNameException::missingMethod((string) $sampleClass, 'missingMethod');
        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());

        $sampleClass->mustHaveMethod('missingMethod');
    }
}