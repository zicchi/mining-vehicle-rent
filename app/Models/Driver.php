<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id','name','phone','status','created_at','updated_at'
    ];

    public function site(){
        return $this->belongsTo(Site::class);
    }

}
