<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $fillable = [
      'programme_id',
      'session_id',
      'level_id',
      'semester_id',
      'student_id',
      'course_id',
      'ca_score',
      'exam_score',
      'total_score',
      'grade_id',
      'grade_status'
    ];

    public function student(): Attribute
    {
        return Attribute::make(get: fn($val, $attr) => Student::find($attr['student_id'])->first());
    }

    public function grade(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Grade::find($attributes['grade_id'])?->grade);
    }

    public function gradePoint(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Grade::find($attributes['grade_id'])?->point);
    }

    public function courseName(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Course::find($attributes['course_id'])?->name);
    }

    public function courseCode(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Course::find($attributes['course_id'])?->code);
    }

    public function courseUnit(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Course::find($attributes['course_id'])?->credit_unit);
    }
    public function level(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Level::find($attributes['level_id'])?->name);
    }
}
