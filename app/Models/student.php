<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade_id',
        'email',
        'address',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function department()
    {
        return $this->hasOneThrough(
            Department::class,
            Grade::class,
            'id', // Foreign key di tabel grades
            'id', // Foreign key di tabel departments
            'grade_id', // Local key di tabel students
            'department_id' // Local key di tabel grades
        );
    }

}
