<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyParticipantRequest;
use App\Services\ParticipantService;
use Illuminate\Http\JsonResponse;

class AuctionParticipantController extends Controller
{
    public function __construct(private ParticipantService $service) {}

    public function verify(VerifyParticipantRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        
        $this->service->verifyParticipant($validatedData['peserta'], $validatedData);

        return response()->json([
            'status_code' => 200,
            'message' => 'Berhasil memproses verifikasi peserta lelang',
        ]);
    }
}