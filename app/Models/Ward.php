<?php

namespace App\Models;

use App\Models\Lga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ward extends Model
{
    use HasFactory;

    protected $table = "ward";

    public $timestamps = false;

    protected $appends = ['lga_name'];

    public function getLgaNameAttribute()
    {
        $lga_id = $this->original['lga_id'];
        return Lga::where('lga_id', $lga_id)->first()->lga_name;
    }
}
