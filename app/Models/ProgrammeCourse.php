<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammeCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'programme_id',
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

    public function semester(): Attribute
    {
        return Attribute::make(get: fn($val, $attr) => Semester::find($attr['semester_id'])?->name);
    }
}
