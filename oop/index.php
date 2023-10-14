<?php

// Access modifiers: public, private, protected, Encapculation
// Constructor
// Inheritence(Meros olish), Overriding
//Abstract class
//Interface, Polymorphism
//Trait


class House{
    public $primarycolor = "black";
    public function ChangeColor($color){
        $this->primarycolor = $color;
    }


    public function getColor():string{
        return "red";
    }

    public static function mystatic(){
        echo "Salom!";
    }

}

class MyHouse extends House{
    public function ChangeColor($color){
        $this->primarycolor = $color;
    }
}

$q = new House();
$q->ChangeColor("Sariq");

$w = new MyHouse();
$w->ChangeColor(123);

print_r($q);
print_r($w);

House::mystatic();


?>