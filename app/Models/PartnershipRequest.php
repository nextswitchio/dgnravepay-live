<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'company_email',
        'phone',
        'country',
        'proposal',
        'status',
    ];
}
