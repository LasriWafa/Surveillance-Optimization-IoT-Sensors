<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Captor;
use App\Models\mesure;
use App\Charts\mesuresChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class ChartController extends Controller
{
    public function index(Request $request, $captorId)
    {
        $captor = Captor::findOrFail($captorId);

        $data = $captor->mesures()
            ->select('temperature', 'humidity', 'created_at')
            ->where('created_at', '>=', now()->subDays(7)) // Retrieve data from the last 7 days
            ->orderBy('created_at')
            ->get();

        $xAxis = $data->pluck('created_at')->map(function ($item) {
            return $item->format('Y-m-d'); // Convert the DateTime objects to string format
        })->toArray();

        $chart = LarapexChart::lineChart()
            ->setTitle('Temperature and Humidity Chart')
            ->setXAxis($xAxis)
            ->addLine('Temperature', $data->pluck('temperature')->toArray())
            ->addLine('Humidity', $data->pluck('humidity')->toArray());

        return view('chart.index', compact('chart'));
    }
}
