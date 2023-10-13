<?php

// Access modifiers: public, private, protected, Encapculation
class House{
    public $primarycolor = "black";
    public function ChangeColor($color){
        $this->primarycolor = $color;
    }


    public function getColor(){
        return "red";
    }

}

$MyHouse = new House();


$MyHouse->ChangeColor("Sariq");
echo $MyHouse->primarycolor;

$friendHouse = new House();
echo $friendHouse->primarycolor;

?>