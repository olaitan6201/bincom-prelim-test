<?php

namespace App\Http\Livewire;

use App\Models\AnnouncedPuResult;
use App\Models\Lga;
use Livewire\Component;

class LGAResults extends Component
{
    public $lga_search;

    public function mount()
    {
        $this->lga_search = 0;
    }

    public function render()
    {
        $data = ['page'=>'view_lga','title'=>'Local Government Results'];
        $results = [];
        $parties = [];
        $total = 0;
        
        if(!empty($this->lga_search)){
            $parties = AnnouncedPuResult::distinct()->pluck('party_abbreviation')->toArray();
            $lga_search = intval($this->lga_search); 
            foreach($parties as $party){
                $results[] = AnnouncedPuResult::join('polling_unit', 'uniqueid', 'polling_unit_uniqueid')
                ->join('party', 'party.partyid', 'announced_pu_results.party_abbreviation')
                ->where('polling_unit.lga_id', $lga_search)
                ->where('announced_pu_results.party_abbreviation', $party)
                ->sum('announced_pu_results.party_score');
            }
            $results = array_combine($parties, $results);
            $total = AnnouncedPuResult::join('polling_unit', 'uniqueid', 'polling_unit_uniqueid')
            ->join('party', 'party.partyid', 'announced_pu_results.party_abbreviation')
            ->where('polling_unit.lga_id', $lga_search)
            ->sum('announced_pu_results.party_score');
        }
        $lgas = Lga::all();
        $viewdata = ['lgas'=>$lgas, 'result'=>$results, 'parties'=>$parties, 'total'=>$total];
        return view('livewire.l-g-a-results', $viewdata)->layout('layouts.base', compact('data'));
    }
}
