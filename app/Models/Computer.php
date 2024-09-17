<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Computer extends Model
{
    use HasFactory;
    protected $fillable = ['serial','make','model','mac_address','purchased_date','price'];

     public function monitors(): BelongsToMany
    {
        return $this->belongsToMany(Monitor::class);
    }
}
