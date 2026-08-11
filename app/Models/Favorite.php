<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['spotId', 'note'];

    public function spot()
    {
        return $this->belongsTo(Spot::class, 'spotId', 'id');
    }
}
