<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Captor;
use App\Models\mesure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    //
    public function index()
    {
        $userId = Auth::id();

        // Retrieve the sensors associated with the user
        $user = User::findOrFail($userId);
        $sensorId = $user->captors->pluck('id')->toArray();

        $lastMesure = mesure::where('captor_id', $sensorId)
            ->orderBy('created_at', 'desc')
            ->first();

        $temperatures = mesure::where('captor_id', $sensorId)->orderBy('created_at', 'asc')->take(10)->pluck('temperature');
        $humidities = mesure::where('captor_id', $sensorId)->orderBy('created_at', 'asc')->take(10)->pluck('humidity');

        return view('dashboard', compact('lastMesure', 'temperatures', 'humidities'));
    }
}
