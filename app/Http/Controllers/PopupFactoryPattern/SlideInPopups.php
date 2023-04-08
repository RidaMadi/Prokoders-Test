<?php


namespace App\Http\Controllers\PopupFactoryPattern;


use App\Models\Popup;
use Illuminate\Support\Facades\URL;

class SlideInPopups implements PopupsFactory
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function create()//create slid in popup by Popup model
    {
        Popup::create($this->data);
    }

    public function edit($id)//edit slid in popup by Popup model
    {
        Popup::where('id',$id)->update([
            'page_url' => $this->data['page_url'] ?? URL::current(),
            'type' => $this->data['type'],
            'title' => $this->data['title'] ?? null,
            'content'=> $this->data['content'] ?? null,
            'positionTop'=> $this->data['positionTop'] ?? null,
            'positionLeft'=> $this->data['positionLeft'] ?? null,
            'positionButton'=> $this->data['positionButton'] ?? null,
            'positionRight'=> $this->data['positionRight'] ?? null,
            'delay'=> $this->data['delay'] ?? 0,
            'background_color'=> $this->data['background_color'] ?? 'white',
            'text_color'=> $this->data['text_color'] ?? 'red',
            'font_size'=> $this->data['font_size'] ?? null,
        ]);
    }

    public function delete($id)//delete slid in popup by Popup model
    {
        Popup::where('id',$id)->delete();
    }
}
