<?php


namespace App\Http\Controllers\ObserverPattern;


class UserLog extends Observer
{
    public function __construct(Log $log)
    {
        $this->log = $log;
        $this->log->attach($this);
    }

    //add row of user log
    public function run($state)
    {
        \App\Models\UserLog::create([
            'user_id'=> $this->$state['user_id'],
            'action'=> $this->$state['action'] ?? null,
            'page_url'=> $this->$state['page_url'],
        ]);
    }
}
