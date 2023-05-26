<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'house_no',
        'purok',
        'barangay',
        'city_m',
        'w_stat',
        'address',
        'phone',
        'model',
        'serial_no',
        'unit_info',
        'description',
        'req_date',
        'task_due_date',
        'date_completed',
        'acceptd',
        'status',
        'branch',
        'category',
        'message',
        'technician',
        'device_token',
        'image',
        'reference_no',
        'pay_stat',
        'assessment'
    ];



    public function deleteReq($id)
    {
        $req = $this->find($id);
        $req->delete();
    }



    public function updateReq($data, $id)
    {
        $req = $this->find($id);
        $req->update($data);
    }

    public function customer()
    {
    return $this->belongsTo(User::class, 'customer_id');
    }


    
    public function branch()
    {
    return $this->belongsTo(Branch::class, 'branch');
    }


    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
