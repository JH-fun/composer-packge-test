<?php

class Queue
{
    var $container = array ();
    public function Enqueue($param)
    {
        return $this->_add_data($param);
    }

    public function Dequeue()
    {
        if (count($this->container) == 0) {
            echo "The queue is already empty!";
            return false;
        }
        return array_shift($this->container);
    }

    public function peek()
    {
        if (count($this->container) == 0)
            return "There is no element in this queue!";
        else
            return $this->container[0];
    }

    private function _add_data($param)
    {
        if (is_array($param) and count($param) == 0) {
            echo "param cannot be blank as an array!";
            return false;
        }
        if (is_array($param)) {
            foreach ($param as $v)
                array_push($this->container, $v);
        } else {
            if (is_null($param) or strlen(trim($param)) == 0) {
                echo "param cannot be empty an object!";
                return false;
            }
            array_push($this->container, $param);
        }
        return true;
    }

}

$q = [1, 2, 3, 4, 5];
echo array_pop($q);
echo array_pop($q);
echo array_shift($q);
var_dump($q);



//$q = new Queue();
//$q->Enqueue(array (1, 2, 3, 4, 5));
//$q->Enqueue(6);
//echo $q->peek() . '<br/>';
//print_r($q->container);
//echo '<br/>';
//$q->Dequeue();
//echo $q->peek() . '<br/>';
//print_r($q->container);
