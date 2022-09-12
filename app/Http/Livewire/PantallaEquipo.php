<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Livewire\Component;

class PantallaEquipo extends Component
{
    public $equipo=Equipo::class;
    
    public function render()
    {
        $equipo = new Equipo();
        return view('livewire.pantalla-equipo', compact('equipo'));
    }
}
