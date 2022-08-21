<?php

function sayHello(string $first, string $middle = "", string $last): void {
    echo "Hello $first $middle $last" . PHP_EOL;
}

sayHello("Muhammad", "Syaifullah", "Al Arief");
// sayHello("Muhammad", "Al Arief");

sayHello(last:"Al Arief", middle:"Syaifullah", first:"Muhammad");
sayHello(last:"Al Arief", first:"Muhammad");