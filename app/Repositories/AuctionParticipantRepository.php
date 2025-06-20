<?php

namespace App\Repositories;

use App\Models\Participant;
use App\Models\ParticipantReason;

class AuctionParticipantRepository
{
    public function __construct(private Participant $model) {}

    public function findById(string $id): ?Participant
    {
        return $this->model->with('alasan')->find($id);
    }

    public function updateVerification(string $id, array $data): Participant
    {
        $participant = $this->model->findOrFail($id);
        $participant->fill($data);
        $participant->save();

        return $participant;
    }

    public function createReason(string $participantId, array $data): ParticipantReason
    {
        return ParticipantReason::create(array_merge($data, ['participant_id' => $participantId]));
    }
}