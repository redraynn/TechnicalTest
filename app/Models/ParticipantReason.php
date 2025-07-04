<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantReason extends Model
{
    use HasFactory;

    protected $fillable = ['participant_id', 'alasan', 'catatan'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}