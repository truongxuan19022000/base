<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserInfo extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'member_employee',
        'phone',
        'province_name',
        'district_name',
        'address',
        'payment_method_id',
        'surname_kana',
        'name_kana',
        'surname_kanji',
        'name_kanji',
        'manager_same',
        'manager_surname_kana',
        'manager_name_kana',
        'manager_surname_kanji',
        'manager_name_kanji',
        'department',
        'user_id',
        'company_name',
        'postal_code'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
