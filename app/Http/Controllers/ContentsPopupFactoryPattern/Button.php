<?php


namespace App\Http\Controllers\ContentsPopupFactoryPattern;


class Button implements InterfaceContents
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function create()
    {
        \App\Models\Button::create($this->data);// create row in database by button model
    }

    public function edit($id)
    {
        \App\Models\Button::where('id',$id)->update([// edit row in database by button model
            'popup_id'=> $this->data['popup_id'],
            'text'=> $this->data['text']?? null,
            'textColor'=> $this->data['textColor']?? null,
            'background_color'=> $this->data['background_color']?? null,
            'button_url'=> $this->data['button_url']?? null,
            'button_type'=> $this->data['button_type']?? null,
            'height'=> $this->data['height']?? null,
            'width'=> $this->data['width']?? null,
        ]);
    }

    public function delete($id)
    {
        \App\Models\Button::where('id',$id)->delete(); // delete row in database by button model
    }
}
