<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'upload_files';

    protected $fillable = [
        'id',
        'file_name',
        'file_path',
        'file_type',
        'uploaded_by',
    ];

    public function products(): HasMany 
    {
        return $this->hasMany(Product::class, 'image', 'id');
    }
} 