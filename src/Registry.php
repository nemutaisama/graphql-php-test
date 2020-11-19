<?php
namespace App;

class Registry
{
    private $rootQuery;
    private $echoInput;

    public function rootQuery()
    {
        return $this->rootQuery ?: ($this->rootQuery = new RootQuery($this));
    }

    public function echoInput()
    {
        return $this->echoInput ?: ($this->echoInput = new EchoInput($this));
    }
}
