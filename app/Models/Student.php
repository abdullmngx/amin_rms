<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
      'matric_number',
      'first_name',
      'middle_name',
      'surname',
      'gender',
      'programme_type_id',
      'faculty_id',
      'department_id',
      'programme_id',
      'level_id',
      'email',
      'password'
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => ucwords("{$attributes['first_name']} {$attributes['middle_name']} {$attributes['surname']}") );
    }

    public function programmeType(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => ProgrammeType::find($attributes['programme_type_id'])?->name);
    }

    public function faculty(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => Faculty::find($attributes['faculty_id'])?->name);
    }

    public function department(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => Department::find($attributes['department_id'])?->name);
    }

    public function programme(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => Programme::find($attributes['programme_id'])?->name);
    }

    public function level(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => Level::find($attributes['level_id'])?->name);
    }

    public function student_courses(): HasMany
    {
        return $this->hasMany(StudentCourse::class);
    }

    public function firstSemesterUnits(): Attribute
    {
        $session = Configuration::where('name', 'current_session')->first()->value;
        return Attribute::make(get: function ($val, $att) use ($session) {
            $student_courses = StudentCourse::where('student_id', $att['id'])->where('session_id', $session)->where('semester_id', 1)->get();
            $total = 0;
            foreach ($student_courses as $course)
            {
                $total += $course->course_unit;
            }
            return $total;
        });
    }

    public function secondSemesterUnits(): Attribute
    {
        $session = Configuration::where('name', 'current_session')->first()->value;
        return Attribute::make(get: function ($val, $att) use ($session) {
            $student_courses = StudentCourse::where('student_id', $att['id'])->where('session_id', $session)->where('semester_id', 2)->get();
            $total = 0;
            foreach ($student_courses as $course)
            {
                $total += $course->course_unit;
            }
            return $total;
        });
    }
}
