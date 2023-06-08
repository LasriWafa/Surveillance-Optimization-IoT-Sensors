<?php

namespace App\Http\Controllers;

use App\Models\Captor;
use App\Models\mesure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class mesureController extends Controller
{

    public function index($captorId)
    {
        $perPage = 10; // Define the number of records per page

        $captor = Captor::findOrFail($captorId);
        $mesures = $captor->mesures()->paginate($perPage);

        return view('mesures.index', compact('captor', 'mesures'));
    }


    public function controlSensor(Request $request)
    {
        $command = $request->input('command');

        if ($command === 'on') {
            // Update the sensor status to on
            $sensor = Captor::first();
            $sensor->status = true;
            $sensor->save();
        } elseif ($command === 'off') {
            // Update the sensor status to off
            $sensor = Captor::first();
            $sensor->status = false;
            $sensor->save();
        }

        return redirect()->back()->with('message', 'Command processed successfully');
    }



    public function store(Request $request)
    {
        $sensorData = $request->validate([
            'captor_id' => 'required|integer',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        $sensorStatus = Captor::value('status');

        if ($sensorStatus) {
            $mesure = new Mesure();
            $mesure->captor_id = $sensorData['captor_id'];
            $mesure->temperature = $sensorData['temperature'];
            $mesure->humidity = $sensorData['humidity'];
            $mesure->save();

            return response()->json([
                'message' => 'Sensor data stored successfully',
                'measure' => $mesure,
            ], 201);
        } else {
            return response()->json([
                'message' => 'Sensor is currently off',
            ], 200);
        }
    }



    public function filter(Request $request)
    {

    

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $startDateTime = $startDate . ' 00:00:00';
        $endDateTime = $endDate . ' 23:59:59';
 
        $mesures = mesure::whereBetween('created_at', [$startDateTime, $endDateTime])->paginate(10);
     
       
        return view('mesures.index', compact('mesures', 'startDate', 'endDate'));
    }
}


 