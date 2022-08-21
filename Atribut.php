<?php
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS)]
class notBlank {

}

#[Attribute(Attribute::TARGET_PROPERTY)]
class Length {
    public int $min;
    public int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;

    }
}

class LoginRequest {
    #[notBlank]
    #[Length(min: 4, max:10)]
    public ?string $username;
    
    #[Length(min: 8, max:10)]
    #[notBlank]
    public ?string $password;
}

function validate(object $object) {
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
    foreach($properties as $proeprty) {
        
        validateNotBlank($proeprty, $object);
        validateLength($proeprty, $object);
    }
}

function validateNotBlank(ReflectionProperty $property, Object $object){
    $atritbutes = $property->getAttributes(notBlank::class);
    if(count($atritbutes) > 0){
        if (!$property->isInitialized($object)) {
            throw new Exception("Property $property->name is null");
        }else if ($property->getValue($object) == null) {
            throw new Exception("Property $property->name is null");
        }
    }
}

function validateLength(ReflectionProperty $property, Object $object){
    if(!$property->isInitialized($object) || $property->getValue($object) == null){
        return;
    }

    $value = $property->getValue($object);
    $atributes = $property->getAttributes(Length::class);
    foreach($atributes as $atribute){
        $length = $atribute->newInstance();
        $valueLength = strlen($value);
        if($valueLength < $length->min){
            throw new Exception("Property $property->name is too short");
        }
        if($valueLength > $length->max){
            throw new Exception("Property $property->name is too long");
        }
    }
}



$request = new LoginRequest();
$request->username = "arief";
$request->password = "rahasia123";
validate($request);