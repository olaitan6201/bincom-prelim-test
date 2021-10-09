<?php

namespace App\Models;

use App\Models\StateModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lga extends Model
{
    use HasFactory;

    protected $table = "lga";

    public $timestamps = false;

    protected $appends = ['state_name'];

    public function getStateNameAttribute()
    {
        $state_id = $this->original['state_id'];
        return StateModel::where('state_id', $state_id)->first()->state_name;
    }
}
