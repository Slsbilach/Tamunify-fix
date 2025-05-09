<?php

namespace App\Models;

use App\Enums\VisitorType;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'name',
        'identity_number',
        'phone',
        'email',
        'photo',
        'type',
    ];

    protected $casts = [
        'type' => VisitorType::class
    ];

    public function internships()
    {
        return $this->hasOne(VisitorInternship::class, 'visitor_id');
    }

    public function recurrings()
    {
        return $this->hasOne(VisitorRecurring::class, 'visitor_id');
    }
}
