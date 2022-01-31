<?php

namespace Practice\TestClasses;

class Fruit {

    private string $color;
    private string $name;
    private int $weight;
    private bool $isDetailsSet = false;

    public function __construct(string $color, string $name, int $weight) {
        $this->color = $color;
        $this->name = $name;
        $this->weight = $weight;
    }

    public function setName(string $name): void {
        $this->color = $name;
    }

    public function getName(): string {
        return $this->name ?? 'not-named-fruit';
    }

    public function setColor(string $colorName): void {
        $this->color = $colorName;
    }

    public function getColor(): string {
        return $this->color;
    }

    
    public function getWeight(): int {
        return $this->weight;
    }

    /**
     * returns true only if the details are set of all the variables, false otherwise
     * @return bool on the behalf of if the details are set or not
     * @throws conditon
     **/
    public function detailsSet() : bool {
        if(isset($this->name) && isset($this->color) && isset($this->weight)) {
            $this->isDetailsSet = true;
            return true;
        }
        return false;
    }


    /**
     * will return the intro to all the fruits, whichever the details are assigned to this class
     * @return string the intro 
     **/
    public function intro() : string {
        $message = "the fruit is {$this->name} \n";
        $message .= "and the color name is {$this->color} \n";
        $message .= "and the fruit weight is {$this->weight} ";
        return $message;
    }


    protected function setWeight(int $weight): void {
        $this->weight = $weight;
    }

    public function __destruct() {
        echo "the fruit name was {$this->name} and fruit color is {$this->color}";
    }
}