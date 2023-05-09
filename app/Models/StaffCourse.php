<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'staff_id',
        'session_id',
        'level_id',
        'semester_id',
        'course_id'
    ];

    public function courseName(): Attribute
    {
        return Attribute::make(get: fn($val, $attr) => Course::find($attr['course_id'])?->name);
    }

    public function courseCode(): Attribute
    {
        return Attribute::make(get: fn($val, $attr) => Course::find($attr['course_id'])?->code);
    }
}
