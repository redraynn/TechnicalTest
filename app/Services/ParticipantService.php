<?php

namespace App\Services;

use App\Repositories\AuctionParticipantRepository;
use Illuminate\Support\Facades\DB;

class ParticipantService
{
    public function __construct(
        private AuctionParticipantRepository $repository
    ) {}

    public function verifyParticipant(string $id, array $data): self
    {
        DB::transaction(function () use ($id, $data) {
            $status = $data['status'] === 'TERIMA' ? 'BIDDING' : 'DITOLAK';
            
            $this->repository->updateVerification($id, ['status' => $status]);

            if ($status === 'DITOLAK') {
                $this->repository->createReason($id, $data);
            } else {
                $this->repository->updateVerification($id, [
                    'pin' => $this->generateBiddingPin()
                ]);
            }
        });

        return $this;
    }

    private function generateBiddingPin(): string
    {
        return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }
}