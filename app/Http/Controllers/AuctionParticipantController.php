<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionParticipantController extends Controller
{
    public function verify(Request $request)
    {
        $validatedData = $request->validate([
            'peserta' => 'required|uuid|exists:participants,id',
            'status' => 'required|in:TERIMA,TOLAK',
            'catatan' => 'nullable|string',
            'alasan' => 'nullable|string|required_if:status,TOLAK',
        ]);

        return response()->json([
            'status_code' => 200,
            'message' => 'Berhasil memproses verifikasi peserta lelang',
        ]);
    }
}