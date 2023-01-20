<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Livewire\Component;
use MatanYadaev\EloquentSpatial\Objects\Point;

class LocationIndex extends Component
{
    protected mixed $homes = [];

    /**
     * @var bool 位置情報が有効
     */
    public bool $geo = true;

    public function load(float $latitude, float $longitude)
    {
        info(self::class, [$latitude, $longitude]);

        $this->homes = Home::query()
                           ->with(['cost'])
                           ->whereNotNull('location')
                           ->withDistanceSphere('location', new Point($latitude, $longitude))
                           ->orderByDistanceSphere('location', new Point($latitude, $longitude))
                           ->limit(50)
                           ->get();
    }

    public function render()
    {
        return view('livewire.location-index')->with(['homes' => $this->homes]);
    }
}
