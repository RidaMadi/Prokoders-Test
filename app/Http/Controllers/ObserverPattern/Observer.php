<?php


namespace App\Http\Controllers\ObserverPattern;


abstract class Observer
{
    protected $log;
    public abstract function run($state);

}
