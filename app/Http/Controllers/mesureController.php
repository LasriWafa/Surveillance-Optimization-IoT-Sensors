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

    public function store(Request $request)
    {
        // Access the request data
        $sensorData = $request->all();

        // Perform validation on the sensor data if needed :  $validatedData
        $sensorData = $request->validate([
            'captor_id' => 'required|integer',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        // Store the sensor data in the measures table
        $mesure = new mesure();
        $mesure->captor_id = $sensorData['captor_id'];
        $mesure->temperature = $sensorData['temperature'];
        $mesure->humidity = $sensorData['humidity'];
        $mesure->save();

        // Return a response indicating success or failure
        return response()->json([
            'message' => 'Sensor data stored successfully',
            'messure' => $mesure,
        ], 201);
    }

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $startDateTime = $startDate . ' 00:00:00';
        $endDateTime = $endDate . ' 23:59:59';

        $mesures = mesure::whereBetween('created_at', [$startDateTime, $endDateTime])->get();

        return view('mesures.index', compact('mesures', 'startDate', 'endDate'));
    }
}
