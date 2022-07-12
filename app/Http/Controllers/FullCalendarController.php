<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class FullCalendarController extends BaseController
{
    public function __construct()
        {
            $this->middleware('auth:api');
        }
    public function test(Request $request){
        $user  = Auth::user();
        // $event = $user->event();
        dd($user);
        return $this->handleResponse($request->all(),"les data sont les usivantes");
    }


    public function getEvent(Request $request){
        
        return $this->handleResponse($request->all(),"les data sont les usivantes");
        if(request()->ajax()){
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
        $events = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
                ->get(['id','title','start', 'end']);
        return response()->json($events);
        }
        return view('fullcalendar');
        
    }
    public function createEvent(Request $request){
        $data = Arr::except($request->all(), ['_token']);
        $events = Event::insert($data);
        return response()->json($events);
    }
   
    public function deleteEvent(Request $request){
        $event = Event::find($request->id);
        return $event->delete();
    }
}
