<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;
    
    protected $fillable = [
        'id_user',
        'id_role',
    ];
}
