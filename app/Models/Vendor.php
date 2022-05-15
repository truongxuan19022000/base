<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vendor extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'vendor_name',
        'user_id',
        'person_in_charge',
        'number_employee',
        'postal_code',
        'address',
        'phone',
        'plan_id',
        'owned_point'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
