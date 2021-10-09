<?php

namespace App\Models;

use App\Models\PollingUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Party extends Model
{
    use HasFactory;

    protected $table = "party";

    public $timestamps = false;

    protected $appends = ['pu_name'];


    public function getPuNameAttribute()
    {
        $id = $this->original['polling_unit_uniqueid'];

        return PollingUnit::where('uniqueid', $id)->first()->polling_unit_name;
    }
}
