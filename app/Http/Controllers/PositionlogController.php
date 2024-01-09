<?php

namespace App\Http\Controllers;

use App\Models\positionlog;
use Illuminate\Http\Request;

class PositionlogController extends Controller
{
    public function incominglog(Request $request){
        $data = [
            'latitude'=>$request->lat,
            'longitude'=>$request->lon
        ];

        positionlog::insert($data);
        return response()->json([
            'status'=>200,
            'message'=>'location saved'
        ]);
    }

    public function last10(){
        $logs = positionlog::orderBy('id','DESC')->limit(10)->get();
        return response()->json($logs);
    }
}
