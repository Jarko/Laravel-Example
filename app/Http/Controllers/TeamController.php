<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Team;
use App\Models\User;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all()->map(function ($team, $key) {
            $team['users'] = $this->getUsers($team->users);

            return $team;
        });

        return response()->json($teams, 200);
    }
 
    public function show(Team $team) {
        $team['users'] = $this->getUsers($team->users);

        return response()->json($team, 200);
    }

    public function store(Request $request) {
        $team = Team::create(['name' =>  $request->input('name')]);

        if($request->input('users')) {
            $this->updateUsers($team->id, $request->input('users'));
        }
        $team['users'] = $this->getUsers($team->users);

        return response()->json($team, 201);
    }

    public function update(Request $request, Team $team) {
       	$team->update($request->all());

        if($request->input('users')) {
            $this->updateUsers($team->id, $request->input('users'));
        }
        $team['users'] = $this->getUsers($team->users);

        return response()->json($team, 200);
    }

    public function delete(Team $team) {
        $id = $team->id;
        $team->delete();

        return response()->json('Team ' . $id . ' Deleted', 200);
    }

    /* Private Functions */

    private function getUsers($users) {
        return $users->map(function ($user, $key) {
            $user['phone'] = $user->phone;
        });
    }

    private function updateUsers($team_id, $users) {
        return User::whereIn('id', $users)->update(['team_id' => $team_id]);
    }
}
