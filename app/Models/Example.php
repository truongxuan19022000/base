<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Example
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email'
    ];
}
