<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'data';
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'qty',
        'price',
        'created_by',
        'update_by'
    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'update_by', 'id');
    }
}
