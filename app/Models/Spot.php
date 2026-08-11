<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $table = 'spots';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'subtitle', 'summary', 'description', 'category', 'district', 'phone', 'address', 'image'];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'spotId', 'id');
    }
}
