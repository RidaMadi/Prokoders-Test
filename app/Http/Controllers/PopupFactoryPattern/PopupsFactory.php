<?php

namespace App\Http\Controllers\PopupFactoryPattern;


interface  PopupsFactory
{
    public function create();
    public function edit($id);
    public function delete($id);
}
