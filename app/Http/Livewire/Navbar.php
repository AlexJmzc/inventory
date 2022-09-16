<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public $sec;

    public function mount($secuencial){
        $this -> sec = $secuencial;
    }

    public function render()
    {
        $secuen = $this -> sec;
        return view('livewire.navbar', compact('secuen'));
    }
}
