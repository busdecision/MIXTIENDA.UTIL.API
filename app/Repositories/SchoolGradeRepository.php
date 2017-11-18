<?php

namespace App\Repositories;

use App\Models\SchoolGrade;

class SchoolGradeRepository
{
    public function all()
    {
        return SchoolGrade::all();
    }
}