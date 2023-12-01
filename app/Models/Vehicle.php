<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    public function getTypeAttribute($value)
    {
        return $value === 'goods' ? 'Muatan Barang' : 'Muatan Manusia';
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 'available':
                return 'Tersedia';
            case 'booked':
                return 'Sedang Digunakan';
            case 'maintenance':
                return 'Dalam Perawatan';
            default:
                return $value;
        }
    }

    public function getOwnershipAttribute($value)
    {
        return $value === 'rent' ? 'Sewa' : 'Milik Perusahaan';
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function monitors(){
        return $this->hasMany(VehicleMonitoring::class);
    }
}
