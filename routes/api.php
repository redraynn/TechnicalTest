<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuctionParticipantController;

Route::post('/auction/participants/verify', [AuctionParticipantController::class, 'verify']);