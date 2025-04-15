<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{

    protected $table = 'role_permissions';

    public $incrementing = true; // hoặc có thể bỏ vì mặc định là true
    
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'role_id',
        'permission_id'
    ];
}
