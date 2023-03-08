<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['service', 'precio'];

    protected $guarded = [];

    //relacion uno a muchos
    public function clients()
    {
        return $this->belongsToMany(Client::class)->withPivot('precio');
    }
}
