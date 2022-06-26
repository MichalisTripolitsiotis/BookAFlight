<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AirportSearchController;
use Livewire\Component;

class InputDropdown extends Component
{
    public $title;
    public $search = "";

    public function mount($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {
            $searchResults = app(AirportSearchController::class)->find($this->search);
        }

        return view('livewire.input-dropdown', ['data' => $searchResults]);
    }
}
