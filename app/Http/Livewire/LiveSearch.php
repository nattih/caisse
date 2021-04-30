<?php

namespace App\Http\Livewire;

use App\Pole;
use Livewire\Component;


class LiveSearch extends Component
{
    public $name;
    public $search;
    public function render()
    {
        return view('livewire.live-search',[
            'posts' => Pole::where('nom', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
