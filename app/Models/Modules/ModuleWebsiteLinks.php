<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleWebsiteLinks extends Model {
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'status',
        'sort',
    ];
}
