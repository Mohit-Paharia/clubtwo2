<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\Event;

class ClubController extends Controller
{
    public function dashboard(Club $club) 
    {
        return view('club.dashboard', [
            'club' => $club
        ]);
    }

    public function acceptJoinRequest(Club $club, User $user) 
    {
        $club->members()->attach($user->id);
        $club->joinRequests()->detach($user->id);
        return back()->with(['result' => 'User Joined the Club!']);
    }

    public function rejectJoinRequest(Club $club, User $user)
    {
        $club->joinRequests()->detach($user->id);
        return back()->with(['result' => 'Rejected User!']);
    }

    public function blockUser(Club $club, User  $user)
    {
        $club->blockedUsers()->attach($user->id);
        $club->joinRequests()->detach($user->id);   
        $club->members()->detach($user->id);
        return back()->with(['result' => 'User Blocked!']);
    }

    public function unblockedUser(Club $club, User $user)
    {
        $club->blockedUsers()->detach($user->id);
        return back()->with(['result' => 'User Unblocked!']);
    }

    public function removeMember(Club $club, User $user) 
    {
        $club->members()->detach($user->id);
        return back()->with(['result'=> 'Member Removed']);
    }

    public function showEvent(Club $club, Event $event)
    {
        return view('club.event.show', [
            'event' => $event
        ]);
    }

    public function create() {
        return view('club.event.create');
    }

    public function deleteEvent(club $club, Event $event)
    {
        $event->delete();
        return back()->with(['result'=> 'Event Deleted']);
    }
}
