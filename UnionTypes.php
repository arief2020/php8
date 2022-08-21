<?php

class Example{
    public string|int|bool|array $data;
}

$example = new Example();
$example->data = "eko";
$example->data = 1;
$example->data = true;
$example->data = [];

function sampleFuntion(string|array $data): string|array{
    if(is_array($data)){
        return ["Array"];
    }elseif(is_string($data)){
        return "string";
    }
}
var_dump(sampleFuntion("Eko"));
var_dump(sampleFuntion([]));