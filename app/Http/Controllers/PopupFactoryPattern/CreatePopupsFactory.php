<?php


namespace App\Http\Controllers\PopupFactoryPattern;


use App\Http\Controllers\Controller;
use App\Http\Controllers\ObserverPattern\Log;
use App\Http\Controllers\ObserverPattern\UserLog;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\UpdatePopupRequest;
use App\Traits\GeneralTrait;
use InvalidArgumentException;
use Illuminate\Http\Request;

class CreatePopupsFactory extends Controller
{
   use GeneralTrait;
    public function create(TypeRequest $request)
    {
        //get type of popups to call his class
        $type = $request->input('type');
        switch ($type) {
            case 'fullscreen': //call FullScreenPopups class
            {
                $fullScreenPopups = new FullScreenPopups($request->toArray());
                $fullScreenPopups->create();
                break;
            }
            case 'slide_in': //call SlideInPopups class
            {
                $slideInPopups = new SlideInPopups($request->toArray());
                $slideInPopups->create();
                break;
            }
            case 'exit_intent'://call ExitIntentPopups class
            {
                $exitIntentPopups = new ExitIntentPopups($request->toArray());
                $exitIntentPopups->create();
                break;
            }
            default://if do not match
            {
                return redirect()->back()->with('error', 'create error');
            }
        }
        return redirect()->back()->with('success', 'create successfully');
    }


    public function edit(UpdatePopupRequest $request){
        $type = $request->input('type');
        $id = $request->input('id');
        switch ($type) {
            case 'fullscreen':
            {
                $fullScreenPopups = new FullScreenPopups($request->toArray());
                $fullScreenPopups->edit($id);
                break;
            }
            case 'slide_in':
            {
                $slideInPopups = new SlideInPopups($request->toArray());
                $slideInPopups->edit($id);
                break;
            }
            case 'exit_intent':
            {
                $exitIntentPopups = new ExitIntentPopups($request->toArray());
                $exitIntentPopups->edit($id);
                break;
            }
            default:
            {
                return redirect()->back()->with('error', 'edit error');
            }
        }
        return redirect()->back()->with('success', 'edit successfully');
    }

    public function delete(UpdatePopupRequest $request){
        $type = $request->input('type');
        $id = $request->input('id');
        switch ($type) {
            case 'fullscreen':
            {
                $fullScreenPopups = new FullScreenPopups($request->toArray());
                $fullScreenPopups->delete($id);
                break;
            }
            case 'slide_in':
            {
                $slideInPopups = new SlideInPopups($request->toArray());
                $slideInPopups->delete($id);
                break;
            }
            case 'exit_intent':
            {
                $exitIntentPopups = new ExitIntentPopups($request->toArray());
                $exitIntentPopups->delete($id);
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
