<?php


namespace App\Http\Controllers\ContentsPopupFactoryPattern;


interface InterfaceContents
{
    public function create();
    public function edit($id);
    public function delete($id);
}
