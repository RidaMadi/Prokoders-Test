<?php


namespace App\Http\Controllers\PopupFactoryPattern;


use App\Models\Popup;
use Illuminate\Support\Facades\URL;

class ExitIntentPopups implements PopupsFactory
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function create()//create exit popup by Popup model
    {
        Popup::create($this->data);
    }

    public function edit($id)//edit exit popup by Popup model
    {
        Popup::where('id',$id)->update([
            'page_url' => $this->data['page_url'] ?? URL::current(),
            'type' => $this->data['type'],
            'title' => $this->data['title'] ?? null,
            'content'=> $this->data['content'] ?? null,
            'background_color'=> $this->data['background_color'] ?? 'white',
            'text_color'=> $this->data['text_color'] ?? 'red',
            'font_size'=> $this->data['font_size'] ?? null,
        ]);
    }

    public function delete($id)//delete exit popup by Popup model
    {
        Popup::where('id',$id)->delete();
    }
}
