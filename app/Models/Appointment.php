<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    //assign primary key
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'appointment_id',
        'date',
        'created_at',
        'time',
        'user_id'
    ];
}