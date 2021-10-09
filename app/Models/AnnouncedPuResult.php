<?php

namespace App\Models;

use App\Models\PollingUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncedPuResult extends Model
{
    use HasFactory;

    protected $table = "announced_pu_results";

    public $timestamps = false;

    protected $appends = ['pu_name'];

    public function getPuNameAttribute()
    {
        $pu_id = $this->original['polling_unit_uniqueid'];

        return PollingUnit::where('uniqueid', $pu_id)->first();
    }
}
