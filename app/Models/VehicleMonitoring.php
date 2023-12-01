<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMonitoring extends Model
{
    use HasFactory;
    public function getTypeAttribute($value)
    {
        switch ($value) {
            case 'fuel-usage':
                return 'Konsumsi Bahan Bakar';
            case 'fuel-refill':
                return 'Pengisian Bahan Bakar';
            case 'maintenance':
                return 'Perawatan';
            default:
                return $value;
        }
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
