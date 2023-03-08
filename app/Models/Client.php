<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Hour;
use App\Models\Service;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'user_id', 'hour_id'];

    protected $guarded = [];

    //relacion uno a muchos (inversa)
    public function user(){
        //$user = User::find($this->user_id);

        return $this->belongsTo(User::class);
    }

    public function hour()
    {
        return $this->belongsTo(Hour::class);
    }

    //Relacion muchos a muchos
    public function services()
    {
        return $this->belongsToMany(Service::class)
            ->withPivot(['cantidad', 'precio'])
            ->withTimestamps();
    }
}
