<?php

namespace App\Models;

use App\Models\Lga;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PollingUnit extends Model
{
    use HasFactory;

    protected $table = "polling_unit";

    public $timestamps = false;

    protected $appends = ['ward_name','lga_name'];

    public function getWardNameAttribute()
    {
        $ward_id = $this->original['ward_id'];

        return Ward::where('ward_id', $ward_id)->first()->ward_name;
    }

    public function getLgaNameAttribute()
    {
        $lga_id = $this->original['lga_id'];

        return Lga::where('lga_id', $lga_id)->first()->lga_name;
    }

}
