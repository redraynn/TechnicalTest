<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama', 'pin'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function reasons()
    {
        return $this->hasMany(ParticipantReason::class);
    }
}