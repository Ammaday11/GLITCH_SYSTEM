<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Designation,
    User,
};
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;


class Glitch extends Model
{
    use HasFactory;
    //protected $gurded = ['id'];
    protected $fillable = [
        'user_id',
        'room_no',
        'guest_name',
        'category',
        'title',
        'description',
        'status',
        'updated_by',
        'arrival_date',
        'departure_date',
        'follow_up_by',
        'follow_up_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }
}
