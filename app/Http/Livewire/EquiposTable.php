<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Equipo;

class EquiposTable extends DataTableComponent
{
    protected $model = Equipo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('Secuencial');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "Secuencial")
                ->sortable(),
            Column::make("Modelo", "Modelo")
                ->sortable(),
            Column::make("Serie", "Serie")
                ->sortable(),
            Column::make("Dominio", "Dominio")
                ->sortable(),
            Column::make("Dirección IP", "DireccionIP")
            ->sortable(),

            Column::make('Acciones')
            ->sortable()
            ->format(function($value,$column, $row){
                return view('botones')->withUser($row);
            })           
        ];
    }

    public function query():Builder
    {
        return Equipo::query();
    }

}
