<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=["name","birth_date","phone_number","address","credit_card","franchise","email","credit_card_last_numbers","user_id"];
}
