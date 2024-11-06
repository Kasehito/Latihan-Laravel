<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['11 PPLG 1', '11 PPLG 2', '12 PPLG 1', '12 PPLG 2','10 PPLG 1','10 PPLG 2','10 ANIMASI 1','10 ANIMASI 2','10 ANIMASI 3','10 ANIMASI 4','10 ANIMASI 5','10 DKV 1','10 DKV 2','10 DKV 3','10 DKV 4','11 ANIMASI 1','11 ANIMASI 2','11 ANIMASI 3','11 ANIMASI 4','11 ANIMASI 5','11 DKV 1','11 DKV 2','11 DKV 3','11 DKV 4','12 ANIMASI 1','12 ANIMASI 2','12 ANIMASI 3','12 ANIMASI 4','12 ANIMASI 5','12 DKV 1','12 DKV 2','12 DKV 3','12 DKV 4','12 PPLG 1','12 PPLG 2']),
        ];
    }
}