<?php
class Tamagotchi
{
    private $name;
    private $food;  // number - increment
    private $love;  // love - increment
    private $sleep;  // Boolean - true or false

    function __construct($name, $food, $love, $sleep)
    {
        $this->name = $name;
        $this->food = 0;
        $this->love = 0;
        $this->sleep = false;
    }

    function getName()
    {
        return $this->name;
    }

    function getFood()
    {
        return $this->food;
    }

    function getLove()
    {
        return $this->love;
    }

    function getSleep()
    {
        return $this->sleep;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function setFood()
    {
        $this->food = $food ++;
    }

    function setLove()
    {
        $this->love = $love ++;
    }

    function setSleep()
    {
        $this->sleep = true;
    }

    function wake()
    {
        $this->sleep = false;
    }


}
?>
