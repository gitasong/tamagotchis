<?php
class Tamagotchi
{
    private $name;
    private $food;  // number - increment
    private $love;  // love - increment
    private $sleep;  // Boolean - true or false
    private $amt_sleep;  // amount of sleep - increment

    function __construct($name, $food, $love, $sleep, $amt_sleep)
    {
        $this->name = $name;
        $this->food = 1;
        $this->love = 1;
        $this->sleep = false;
        $this->amt_sleep = 1;
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

    function getAmtSleep()
    {
        return $this->amt_sleep;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function setFood()
    {
        $this->food = $food++;
    }

    function setLove()
    {
        $this->love = $love++;
    }

    function setSleep()
    {
        $this->sleep = true;
    }

    function setAmtSleep()
    {
        $this->amt_sleep = $amt_sleep++;
    }

    function wake()
    {
        $this->sleep = false;
    }

    function isDead()
    {
        if (($this->getFood() == 0) || ($this->getLove() == 0) || ($this->getAmtSleep() == 0))
        {
            return "Your Tamagotchi is dead!";
        }
    }


}
?>
