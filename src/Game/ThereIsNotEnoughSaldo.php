<?php

namespace Game;

class ThereIsNotEnoughSaldo extends \Exception
{
    public function __construct()
    {
        parent::__construct();
    }
}