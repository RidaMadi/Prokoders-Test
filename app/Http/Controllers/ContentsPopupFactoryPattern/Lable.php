<?php


namespace App\Http\Controllers\ContentsPopupFactoryPattern;


class Lable implements InterfaceContents
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function create()
    {
        \App\Models\Lable::create($this->data);// create row in database by Lable model
    }

    public function edit($id) // edit row in database by Lable model
    {
        \App\Models\Lable::where('id',$id)->update([
            'popup_id' => $this->data['popup_id'],
            'text' => $this->data['text']?? null,
            'color' => $this->data['color']?? null,
            'font_size' => $this->data['font_size']?? null,
            'height' => $this->data['height']?? null,
            'width' => $this->data['width']?? null,
        ]);
    }

    public function delete($id)
    {
        \App\Models\Lable::where('id',$id)->delete(); // delete row in database by Lable model
    }
}
