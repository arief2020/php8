<?php
$value = "j";
$result = "";

switch($value){
    case "A":
    case "B":
    case "C":
        $result = "Anda Lulus";
        break;
    case "D":
        $result = "Anda tidak lulus";
        break;
    case "E":
        $result = "Mungkin Anda Salah Jurusan";
        break;
    default:
        $result = "Nilai apa itu";
}

echo $result . PHP_EOL;

$result = match($value){
    "A", "B", "C" => "Anda Lulus",
    "D" => "Anda tidak lulus",
    "E" => "Mungkin anda salah jurusan",
    default => "Nilai apa itu?",
};

echo $result . PHP_EOL;

$value = 80;

$result = match(true){
    $value >= 80 => "A",
    $value >= 70 => "B",
    $value >= 60 => "C",
    $value >= 50 => "D",
    default => "E"
};

echo $result . PHP_EOL;

$name = "Mrs. Eka";

$result = match(true){
    str_contains($name, "Mr.") => "Hello sir",
    str_contains($name, "Mrs.") => "Hello mom",
    default => "hello"

};

echo $result . PHP_EOL;