<?php declare(strict_types=1);

namespace Comquer\ReflectionTest;

use Comquer\Reflection\ClassNamespace;
use Comquer\Reflection\ClassNamespaceException;
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
}