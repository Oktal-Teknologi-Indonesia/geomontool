<?php

namespace App\Http\Controllers;

use App\Models\positionlog;
use App\Models\Postlog;
use Illuminate\Http\Request;

class PositionlogController extends Controller
{
    public function incominglog(Request $request){
    $posted = $request->json()->all();
    return $posted;
        positionlog::create([
            'latitude'=>$posted['lat'],
            'longitude'=>$posted['lon'],
            'device'=>$posted['dev']
        ]);

        $data = $posted['lat'] .', '. $posted['lon'] . ', ' . $posted['dev'];
        Postlog::create(['data'=>$data]);

        return response()->json([
            'status'=>200,
            'message'=>'location saved'
        ]);

    }

    public function last50(){
        $logs = positionlog::orderBy('id','DESC')->limit(50)->get();
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
