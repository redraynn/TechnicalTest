<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionParticipantController extends Controller
{
    public function verify(Request $request)
    {
        // Handle the verification logic here
        $validatedData = $request->validate([
            'peserta' => 'required|uuid|exists:participants,id',
            'status' => 'required|in:TERIMA,TOLAK',
            'catatan' => 'nullable|string',
            'alasan' => 'nullable|string|required_if:status,TOLAK',
        ]);

        // Process the verification
        // ...

        return response()->json([
            'status_code' => 200,
            'message' => 'Berhasil memproses verifikasi peserta lelang',
        ]);
    }
}