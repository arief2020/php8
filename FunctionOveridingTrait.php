<?php
trait SampleTrait{
    public abstract function sampleFuntion(string $name): string;
}

class SampleClass {
    use SampleTrait;
    public function sampleFuntion(int $name): string
    {
        return "string";
    }
}