<?php
 
namespace App\Models\MainStructure;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticate;
 
class AccountUsers extends Authenticate
{
    use Notifiable;
 
    protected $guard = 'user';
 
    protected $fillable = [
        'name', 
        'account', 
        'password',
        'email',
        'numberphone',
        'active'
    ];
 
    protected $hidden = [
        'password'
    ];

    public function article(){
        return $this->hasMany('App\Models\Modules\ModuleArticles');
    }
    public function construction_products(){
        return $this->hasMany('App\Models\Modules\ModuleConstructionProducts');
    }
}