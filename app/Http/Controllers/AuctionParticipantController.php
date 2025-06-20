<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyParticipantRequest;
use App\Services\ParticipantService;

class AuctionParticipantController extends Controller
{
    public function __construct(
        private ParticipantService $service
    ) {}

    public function verify(VerifyParticipantRequest $request)
    {
        $this->service->verifyParticipant(
            $request->peserta,
            $request->validated()
        );

        return response()->json([
            'status_code' => 200,
            'message' => 'Berhasil memproses verifikasi peserta lelang',
        ]);
    }
}