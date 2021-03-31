<?php


namespace Algorithms\Graph;


class Person
{
    public $name;
    public $friends;
    public $visited;

    public function __construct($name)
    {
        $this->name = $name;
        $this->friends = [];
        $this->visited = false;
    }

    public function addFriend(Person $person)
    {
        foreach ($this->friends as $friend) {
            if ($friend == $person->name) {
                return;
            }
        }

        $this->friends[] = $person;
    }

    public function displayNetworkByBFS()
    {
        $toReset = [$this];
        $queue = [$this];
        $this->visited = true;

        while ($queue) {
            $currentVertex = array_shift($queue);
            echo $currentVertex->name.PHP_EOL;

            foreach ($currentVertex->friends as $friend) {
                if (!$friend->visited) {
//                    在数组开头插入一个或多个单元
                    array_unshift($toReset, $friend);
                    array_unshift($queue, $friend);
                    $friend->visited = true;
                }
            }
        }

        foreach ($toReset as $person) {
            $person->visited = false;
        }
    }

    /*
     * 深度遍历
     */
    public function displayNetworkByDFS($depth)
    {
        $stack = [$this];
        $this->visited = true;

        if ($this->friends){
            foreach ($this->friends as $friend) {
                array_push($friend, $stack);
            }
        }
    }

}

$mary = new Person("Mary");
$peter = new Person("Peter");
$peter1 = new Person("Peter1");
$peter2 = new Person("Peter2");
$peter3 = new Person("Peter3");
$henry = new Person("Henry");
$henry1 = new Person("Henry1");
$henry2 = new Person("Henry2");
$henry3 = new Person("Henry3");

$mary->addFriend($peter);
$mary->addFriend($henry);
$peter->addFriend($peter1);
$peter->addFriend($peter2);
$peter->addFriend($peter3);
$henry->addFriend($henry1);
$henry->addFriend($henry2);
$henry->addFriend($henry3);

$mary->displayNetworkByBFS();
