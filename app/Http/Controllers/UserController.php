<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Belt;
use App\Group;


class UserController extends Controller
{

		public function index()
		{
				$users = User::orderBy('group_id')->orderBy('lastname')->get();
				return view('users.index', ['users' => $users]);
		}

		public function detail(User $user)
		{
			return view('users.detail', [ 'user' => $user ]);
		}

		public function edit(User $user)
		{
				$groups = Group::all();
				$belts = Belt::orderBy('ordering')->get();
				return view('users.edit', ['user' => $user, 'belts' => $belts, 'groups' => $groups]);
		}

		public function update(Request $request, User $user)
		{
				$this->validate($request, [
						'firstname' => 'required|max:255',
						'lastname' => 'required|max:255'
				]);

				// TODO more comfortable laravel way to manage relationships?
				$user->firstname = $request->firstname;
				$user->lastname = $request->lastname;
				if ($request->belt) {
					$user->belt()->associate($request->belt);
				} else {
					$user->belt()->dissociate();
				}
				if ($request->grade) {
					$user->group()->associate($request->group);
				} else {
					$user->group()->dissociate();
				}
				$user->admin = ($request->admin) ? true : false;
				$user->instructor = ($request->instructor) ? true : false;

				$user->save();

				return redirect('users/'.$user->id);
		}

		public function delete(User $user) {
				$user->delete();
				return redirect('users');
		}
}
