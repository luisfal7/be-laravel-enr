<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Hour extends Model
{
    use HasFactory;

    protected $fillable = ['hour'];

    protected $guarded = [];
    
    //relacion uno a muchos
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
