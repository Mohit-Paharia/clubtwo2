<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;

class AdminController extends Controller
{
    public function index() {

        $unapprovedClubs = Club::where('approved', false)
                            ->get();

        return view('admin.dashboard', [
            'clubs' => $unapprovedClubs
        ]);
    }
    
    public function approveClub(Club $club) {
        $club->approve();
        return response()->json([
            'success' => true,
            'message' => 'Club approved!'
        ]);
    }

    public function rejectClub(Club $club) {
        $club->delete();
        return response()->json([
            'success' => true,
            'message' => 'Club Rejected!'
        ]);
    }
}
