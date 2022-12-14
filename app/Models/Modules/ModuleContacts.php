<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleContacts extends Model{
	protected $fillable = [
        'name', 
        'numberphone', 
        'email',
        'content',
        'status',
        'user_id'
    ];
}