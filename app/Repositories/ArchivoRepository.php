<?php

namespace App\Repositories;

use App\Models\Archivo;

class ArchivoRepository
{
    public function search($search_param, $size)
    {
        return Archivo::with(['estado'])->paginate($size);
    }
}