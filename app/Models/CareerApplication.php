<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CareerApplication extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    const DEPARTMENTS = [
        'Operations',
        'Air Freight',
        'Sea Freight',
        'Road & Rail Freight',
        'Customs & Documentation',
        'Warehousing & Inventory',
        'Sales & Marketing',
        'Customer Service',
        'Accounts & Finance',
        'Human Resources',
        'IT',
        'Administration',
    ];

    public function fullName(){
        return trim($this->first_name.' '.$this->last_name);
    }

    public function deleteResume(){
        if($this->resume_path && Storage::disk('local')->exists($this->resume_path)){
            Storage::disk('local')->delete($this->resume_path);
        }
    }
}
