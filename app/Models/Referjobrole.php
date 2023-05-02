<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referjobrole extends Model
{
    use HasFactory;
        protected $fillable = [
        'referjobrole_id',
        'user_id',
        'referjobrole_state',
        'referjobrole_city',
        'referjobrole_visa',
        'referjobrole_rate',
        'implementation_name',
        'imp_email',
        'imp_contact',
        'pv_name',
        'pv_email',
        'pv_contact',
        'end_client',
        'job_description',
        'referjobrole_by',
        

    ];
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
