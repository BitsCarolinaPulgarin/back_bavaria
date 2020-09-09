<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = "nomina";
    protected $fillable = ['date', 'status', 'amount', 'user_id'];
}
