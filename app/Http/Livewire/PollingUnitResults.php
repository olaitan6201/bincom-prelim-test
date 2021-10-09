<?php

namespace App\Http\Livewire;

use App\Models\AnnouncedPuResult;
use Livewire\Component;
use Livewire\WithPagination;

class PollingUnitResults extends Component
{
    use WithPagination;

    public $search;

    public function mount()
    {
        $this->search = '';
    }
    
    public function render()
    {
        $pu_results = AnnouncedPuResult::select('lga.lga_name', 'ward.ward_name', 'polling_unit.*', 'announced_pu_results.*');

        if(!empty($this->search)){
            $pu_results = $pu_results->where('lga.lga_name', 'LIKE', '%'.$this->search.'%')
            ->OrWhere('ward.ward_name', 'LIKE', '%'.$this->search.'%')
            ->OrWhere('polling_unit.polling_unit_name', 'LIKE', '%'.$this->search.'%')
            ->OrWhere('announced_pu_results.party_abbreviation', 'LIKE', '%'.$this->search.'%')
            ->OrWhere('polling_unit.polling_unit_number', 'LIKE', '%'.$this->search.'%');
        }

        $pu_results = $pu_results->join('polling_unit', 'uniqueid', 'polling_unit_uniqueid')
        ->join('lga', 'polling_unit.lga_id', 'lga.lga_id')
        ->join('ward', 'polling_unit.ward_id', 'ward.ward_id')->paginate(10);

        $data = ['page'=>'view_poll', 'title'=>'Polling Unit Result'];
        return view('livewire.polling-unit-results', compact('pu_results'))->layout('layouts.base', compact('data'));
    }
}
