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
        $this->food = $food;
        $this->love = $love;
        $this->sleep = $sleep;
        $this->amt_sleep = $amt_sleep;
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
        $this->sleep = 1;
        $this->amt_sleep ++;
        return "Your Tamagotchi is asleep!";
    }

    function setAmtSleep()
    {
        $this->amt_sleep = $amt_sleep++;
    }

    function wake()
    {
        $this->sleep = 0;
    }

    function save()  // pushes each new tamagotchi to array; saves in $_SESSION variable 'saved_tamagotchis'
    {
        array_push($_SESSION['saved_tamagotchis'], $this);
    }

    function isDead()
    {
        if (($this->getFood() == 0) || ($this->getLove() == 0) || ($this->getAmtSleep() == 0))
        {
            return "Your Tamagotchi is dead!";
        }
    }

    static function getAll()  // retrieves saved_tamagotchis from $_SESSION variable
    {
        return $_SESSION['saved_tamagotchis'];
    }

    static function deleteAll()  // deletes saved_tamagotchis array
    {
        $_SESSION['saved_tamagotchis'] = array();
    }


}
?>
