<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleSchools extends Model {
    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'is_active',
        'sort',
    ];
}
