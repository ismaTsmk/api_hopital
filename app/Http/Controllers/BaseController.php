<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class BaseController extends Controller
{
    public function handleResponse($data, $msg)
    {
    	$res = [
            'success' => true,
            'data'    => $data,
            'message' => $msg,
        ];
        // dd(response()->json($res, 200));

        return response()->json($res, 200);
    }

    public function handleError($error ="une erreur est survenue", $code = 200)
    {
    	$res = [
            'success' => false,
            'message' => $error,
        ];
        return response()->json($res, $code);
    }

    // public function jsonAction($object = [],$message ="recompense obtenue a la ferme de juvisy")
    // {
    // 	$res = [
    //         'object' => $object,
    //         'message' => $message,
    //     ];
    //     return response()->json($res);
    // }


    public function saveFile($file){
      $fileresp =  $file->storeAs('public/cv','hini_ismael.pdf');
        return substr($fileresp,7);
        // dd($fileresp);
    }

    public  function destroy( ){
    }
    public function minPairValuePerTwo($points){
        $points = intval($points);
        // dd($points/2);
        if ($points%2==0) {  // si points est pair
            // dd(floor($points));
            $points = $points/2;
        }
        else{
            // dd('dddd');
            $points = ($points-1)/2;
        }


        return floor($points);
        
    }

}
