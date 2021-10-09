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
}
