<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AirportSearchController;
use Livewire\Component;

class InputDropdown extends Component
{
    public $title;
    public $query = "";
    public $searchResults = [];

    public function mount($title)
    {
        $this->title = $title;
    }

    /**
     * Get the related results based on the input query.
     *
     * @return $this
     */
    public function updatedQuery()
    {
        if (strlen($this->query) >= 2) {
            $this->searchResults = app(AirportSearchController::class)->find($this->query);
        }
    }

    /**
     * Select the result.
     *
     * @param string $record
     *
     * @return $this
     */
    public function select($record)
    {
        $this->query = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.input-dropdown', ['data' => $this->searchResults]);
    }
}
