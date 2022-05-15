<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ApplicationDetail extends Model
{
    public $table = 'applications_details';
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'negotiation_date',
        'application_id',
        'subsidy_id',
        'product_id',
        'note',
        'price',
        'price_interest',
        'deadline_invoice',
        'working_date_document',
        'noti_delivery_file',
        'display',
        'memo',
        'working_date_billing',
        'deadline_preparation'
    ];
}
