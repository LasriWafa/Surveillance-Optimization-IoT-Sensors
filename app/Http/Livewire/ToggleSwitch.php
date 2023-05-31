<?php

namespace App\Http\Livewire;

use App\Models\Captor;
use App\Models\Sensor;
use Livewire\Component;

class ToggleSwitch extends Component
{
    public $sensorStatus = false;

    public function toggleSensorStatus()
    {
        $sensor = Captor::first();
        $sensor->status = $this->sensorStatus;
        $sensor->save();
    }

    public function render()
    {
        $sensor = Captor::first();

        return view('livewire.toggle-switch', [
            'sensorStatus' => $sensor ? $sensor->status : false,
        ]);
    }
}

?>
