<?php


namespace App\Http\Controllers\ObserverPattern;


class Log
{
    private $state;
    private $observers = array();

    public function getState() {
        return $this->state;
    }

    //this function set the data that will be added to the data base in state and call all object
    public function setState($state) {
        $this->state = $state;
        $this->notifyAllObservers();
    }

    //to add object to objects array
    public function attach($observer) {
        $this->observers[] = $observer;
    }

    // call all object to run their function
    public function notifyAllObservers() {
        foreach ($this->observers as $observer) {
            $observer->run($this->state);
        }
    }
}
