<?php

class Sign
{
    public $abc;
    public function a()
    {
        echo $this->abc;
        echo '<br/>';
        return $this;
    }

    public function b()
    {
        $sing='Sign2';
        $t=new $sing;
        echo 'Sign2';
        echo '<br/>';
        return $t;
    }

}

class Sign2
{
    public $abc;
    public function c()
    {
        echo 'ccc';
        echo '<br/>';
        return $this;
    }

    public function d()
    {
        echo 'ddd';
        echo '<br/>';
        return $this;
    }

}

$checkSign = new Sign();
$checkSign->abc=5;
$sign2=$checkSign->a()->b()->c()->d();

var_dump($sign2);


