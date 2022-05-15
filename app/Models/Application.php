<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Application extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'status',
        'user_id',
        'apply_date'
    ];
    public function applicationDetails()
    {
        return $this->hasMany(ApplicationDetail::class,'application_id', 'id');
    }
}
