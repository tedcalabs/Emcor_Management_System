<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        'req_date',
        'date_completed',
        'acceptd',
        'status',
        'branch',
        'category',
        'message',
        'technician',
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
}
