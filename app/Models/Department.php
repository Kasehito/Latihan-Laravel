<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc'];

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
        
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

}
