<?php

namespace App\Http\Livewire;

use App\Models\AnnouncedPuResult;
use App\Models\Lga;
use App\Models\Ward;
use App\Models\Party;
use App\Models\PollingUnit;
use Livewire\Component;

class NewPollingUnitResult extends Component
{

    public $unitCount = [];
    public $ward_id, $lga_id, $unit_name;

    public function mount()
    {
        $this->unitCount = [];
        for($i = 0; $i<$this->getNumParties(); $i++){
            $this->unitCount[] = 0;
        }

        $this->ward_id = '';
        $this->lga_id = '';
        $this->unit_name = '';
        
    }

    public function getNumParties(): int
    {
        return Party::get()->count();
    }
    public function getParties(): array
    {
        return Party::get()->toArray();
    }

    public function addPollResult(){
        $poll = new PollingUnit();
        $unit_id = rand(0, 100);
        $ward_id = rand(30, 100);
        $unit_number = 'DT'.rand(3000, 3999);
        $poll->polling_unit_id = $unit_id;
        $poll->ward_id = $this->ward_id;
        $poll->lga_id = $this->lga_id;
        $poll->uniquewardid = $ward_id;
        $poll->polling_unit_number = $unit_number;
        $poll->polling_unit_name = $this->unit_name;
        $poll->date_entered = now();

        $poll->save();

        $poll_unique_id = PollingUnit::where('polling_unit_id', $unit_id)->where('uniquewardid', $ward_id)->where('polling_unit_number', $unit_number)->first()->uniqueid;

        for($i = 0; $i<$this->getNumParties(); $i++)
        {
            $result = new AnnouncedPuResult();
            $result->polling_unit_uniqueid = $poll_unique_id;
            $result->party_abbreviation = $this->getParties()[$i]['partyid'];
            $result->party_score = $this->unitCount[$i];
            $result->entered_by_user = 'Test';
            $result->user_ip_address = '127.0.0.1';
            $result->date_entered = now();

            $result->save();
        }
        $this->mount();
        session()->flash('message', 'New Polling Unit and Results added successfully');

    }

    public function render()
    {
        $wards = Ward::all();
        $lgas = Lga::all();
        $data = ['page'=>'add_poll', 'title'=>'Add New Polling Unit Results'];
        $viewdata = ['num'=>$this->getNumParties(), 'parties'=>$this->getParties(), 'wards'=>$wards, 'lgas'=>$lgas];
        return view('livewire.new-polling-unit-result', $viewdata)->layout('layouts.base', compact('data'));
    }
}
