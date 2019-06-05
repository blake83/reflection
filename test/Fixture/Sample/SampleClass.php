<?php declare(strict_types=1);

namespace Comquer\ReflectionTest\Fixture\Sample;

class SampleClass
{
    private $sample;

    public function __construct(string $sample)
    {
        $this->sample = $sample;
    }

    public function getSample() : string
    {
        return $this->sample;
    }

    public function setSample(string $sample) : void
    {
        $this->sample = $sample;
    }
}