<?php

namespace App\Models;

use App\Enums\PurposeType;
use App\Enums\DepartmentType;
use Illuminate\Database\Eloquent\Model;

class VisitorGeneral extends Model
{
    protected $fillable = [
        'visitor_id',
        'company',
        'purpose',
        'person_to_meet',
        'department',
        'visit_date',
        'exit_date',
        'visit_time',
        'exit_time',
        'vehicle_number',
        'additional_info',
    ];

    protected $with = ['visitor'];
    protected $casts = [
        'visit_date' => 'date',
        'exit_date' => 'date',
        'purpose' => PurposeType::class,
        'department' => DepartmentType::class,
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}