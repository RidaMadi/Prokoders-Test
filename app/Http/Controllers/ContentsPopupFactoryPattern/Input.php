<?php


namespace App\Http\Controllers\ContentsPopupFactoryPattern;


class Input implements InterfaceContents
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function create()
    {
        \App\Models\Input::create($this->data); // create row in database by input model
    }

    public function edit($id) // edit row in database by input model
    {
        \App\Models\Input::where('id',$id)->update([
            'popup_id' => $this->data['popup_id'],
            'textColor'=> $this->data['textColor']?? null,
            'name'=> $this->data['name']?? null,
            'height'=> $this->data['height']?? null,
            'width'=> $this->data['width']?? null,
        ]);
    }

    public function delete($id) // delete row in database by input model
    {
        \App\Models\Input::where('id',$id)->delete();
    }
}
