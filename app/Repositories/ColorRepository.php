<?php

namespace App\Repositories;


use App\Models\Color;

class ColorRepository
{
    public function all()
    {
        return Color::all();
    }
}