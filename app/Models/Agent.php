<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
