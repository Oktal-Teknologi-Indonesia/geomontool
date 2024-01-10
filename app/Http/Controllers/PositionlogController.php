<?php

namespace App\Http\Controllers;

use App\Models\positionlog;
use Illuminate\Http\Request;

class PositionlogController extends Controller
{
    public function incominglog(Request $request){
        positionlog::create([
            'latitude'=>$request->lat,
            'longitude'=>$request->lon,
            'device'=>$request->dev
        ]);
        return response()->json([
            'status'=>200,
            'message'=>'location saved'
        ]);
    }

    public function last10(){
        $logs = positionlog::orderBy('id','DESC')->limit(10)->get();
        return response()->json($logs);
    }

    public function myTrip($device){
        $trips= positionlog::where('device',$device)
                ->orderBy('loggedAt','DESC')
                ->limit(100)
                ->get(['latitude','longitude','loggedAt']);
        return response()->json($trips);
    }
}
