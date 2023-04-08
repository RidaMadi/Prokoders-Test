<?php


namespace App\Http\Controllers\ContentsPopupFactoryPattern;


use App\Http\Controllers\Controller;
use App\Http\Controllers\PopupFactoryPattern\ExitIntentPopups;
use App\Http\Controllers\PopupFactoryPattern\FullScreenPopups;
use App\Http\Controllers\PopupFactoryPattern\SlideInPopups;
use App\Http\Requests\TypeElementRequest;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\UpdateElementRequest;
use App\Http\Requests\UpdatePopupRequest;
use App\Traits\GeneralTrait;

class FactoryController extends Controller
{
    use GeneralTrait;
    public function create(TypeElementRequest $request)
    {
        //take type of element to call his class
        $type = $request->input('ElementType');

        switch ($type) {
            case 'input':// call class input
            {
                $input = new Input($request->toArray());
                $input->create();//create row in database(input element)
                break;
            }
            case 'button':// call class button
            {
                $button = new Button($request->toArray());
                $button->create();
                break;
            }
            case 'lable'://call lable class
            {
                $lable = new Lable($request->toArray());
                $lable->create();
                break;
            }
            default://if do not match
            {
                return redirect()->back()->with('error', 'create error');
            }
        }
        return redirect()->back()->with('success', 'create successfully');
    }

    //edit element
    public function edit(UpdateElementRequest $request){
        //take type of element to call his class
        $type = $request->input('ElementType');

        switch ($type) {
            case 'input':
            {
                $input = new Input($request->toArray());
                $input->edit($request->input('id'));//send id element to edit
                break;
            }
            case 'button':
            {
                $button = new Button($request->toArray());
                $button->edit($request->input('id'));
                break;
            }
            case 'lable':
            {
                $lable = new Lable($request->toArray());
                $lable->edit($request->input('id'));
                break;
            }
            default:
            {
                return redirect()->back()->with('error', 'edit error');
            }
        }
        return redirect()->back()->with('success', 'edit successfully');
    }

    //delete element
    public function delete(UpdatePopupRequest $request){
        //take type element to call his class to search in his table
        $type = $request->input('type');
        //take element id
        $id = $request->input('id');
        switch ($type) {
            case 'input':
            {
                $input = new Input($request->toArray());
                $input->delete($id);
                break;
            }
            case 'button':
            {
                $button = new Button($request->toArray());
                $button->delete($id);
                break;
            }
            case 'lable':
            {
                $lable = new Lable($request->toArray());
                $lable->delete($id);
                break;
            }
            default:
            {
                return redirect()->back()->with('error', 'delete error');
            }
        }
        return redirect()->back()->with('success', 'delete successfully');
    }
}

{

}
