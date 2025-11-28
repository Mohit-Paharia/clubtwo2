<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\Event;
use App\Models\Location;
use App\Models\Chat;

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
        return response()->json([
            'success' => true,
            'message' => $user->first_name . ' ' . $user->last_name . ' joined the Club!'
        ]);
    }

    public function rejectJoinRequest(Club $club, User $user)
    {
        $club->joinRequests()->detach($user->id);
        return response()->json([
            'success' => true,
            'message' => 'Join request rejected!'
        ]);
    }

    public function blockUser(Club $club, User  $user)
    {
        $club->blockedUsers()->attach($user->id);
        $club->joinRequests()->detach($user->id);   
        $club->members()->detach($user->id);
        return response()->json([
            'success' => true,
            'message' => $user->first_name . ' ' . $user->last_name . ' is blocked from Club!'
        ]);
    }

    public function unblockedUser(Club $club, User $user)
    {
        $club->blockedUsers()->detach($user->id);
        return response()->json([
            'success' => true,
            'message' => $user->first_name . ' ' . $user->last_name . ' is unblocked from Club!'
        ]);
    }

    public function removeMember(Club $club, User $user) 
    {
        $club->members()->detach($user->id);
        return response()->json([
            'success' => true,
            'message' => $user->first_name . ' ' . $user->last_name . ' is removed from Club!'
        ]);
    }

    public function showEvent(Club $club, Event $event)
    {
        return view('club.event.show', [
            'event' => $event
        ]);
    }

    public function createEvent(Club $club) 
    {
        return view('club.event.create', [
            'club' => $club
        ]);
    }

    
    public function storeEvent(Club $club, Request $request) 
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'host_id' => 'required|max:50',
            'coordinator_id' => 'required|max:50',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'country' => 'required|max:50',
        ]);

        
        $event = Event::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'address' => $request->address,
            'club_id' => $club->id,
            'host_id' => $request->host_id,
            'coordinator_id' => $request->coordinator_id,
            'location_id' => Location::firstOrCreate([
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country 
            ])->id
        ]);
        
        return redirect()->route('club.event.show', [
            'club' => $club->id,
            'event' => $event->id,
        ]);
    }
    public function updateEvent(Request $request, Club $club, Event $event) 
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'host_id' => 'required|max:50',
            'coordinator_id' => 'required|max:50',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'country' => 'required|max:50',
        ]);
        
        $event->update($validated);

        return back()->with('success', 'Event updated!');

    }
    public function deleteEvent(club $club, Event $event)
    {
        $event->delete();
        return response()->json([
            'success' => true,
            'message' => $event . ' event is removed Club!'
        ]);
    }

    public function storeChat(Request $request, Club $club)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $chat = Chat::create([
            'message' => $validated['message'],
            'user_id' => auth()->id(),
            'club_id' => $club->id,
        ]);


        return response()->json([
            'success' => true,
        ]);
    }

    public function deleteChat(Chat $chat)
    {
        if (auth()->user() == $chat->user())
            return response()->json([
            'success' => false,
            'message' => 'You No Owner Bitch!'
        ]);

        $chat->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
