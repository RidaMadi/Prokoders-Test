<?php


namespace App\Http\Controllers\ObserverPattern;



use App\Models\PopupLogin;

class PopupLog extends Observer
{
    public function __construct(Log $log)
    {
        $this->log = $log;
        $this->log->attach($this);
    }

    //add row of log popup
    public function run($state)
    {
        PopupLogin::create([
            'popup_id' => $this->$state['popup_id'],
            'user_id'=> $this->$state['user_id'],
            'clicked'=> $this->$state['clicked'],
            'device_type'=> $this->$state['device_type'] ?? null,
            'page_url'=> $this->$state['page_url'] ?? null,
        ]);
    }
}
