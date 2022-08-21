<?php
function sayHello(?string $name){
    if($name == null){
        throw new Exception("Tidak boleh null");
    }
    echo "Hello $name" . PHP_EOL;
}

function sayHelloException(?string $name){
    $result = $name != null ? "hello $name" : throw new Exception("Tidak Boleh Null");
    echo $result . PHP_EOL;
}

sayHelloException(null);
sayHelloException("Arief");
