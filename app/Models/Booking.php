<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id','driver_id','status','booking_date','site_manager','branch_manager',
    ];

    public function getStatusTextAttribute()
    {
        switch ($this->attributes['status']) {
            case 'pending':
                return 'Menunggu Persetujuan Site Manager';
            case 'first_approval':
                return 'Menunggu Persetujuan Branch Manager';
            case 'approved':
                return 'Telah Disetujui';
            case 'success':
                return 'Selesai Digunakan';
            case 'cancel':
                return 'Tidak Disetujui';
            default:
                return 'Status Tidak Dikenal';
        }
    }


    public function siteManagerApprover()
    {
        return $this->belongsTo(User::class, 'site_manager');
    }

    public function branchManagerApprover()
    {
        return $this->belongsTo(User::class, 'branch_manager');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
