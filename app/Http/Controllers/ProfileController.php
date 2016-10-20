<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\UserRepository;
use App\User;

class ProfileController extends Controller
{
		protected $userRepo;

		public function __construct(UserRepository $userRepo)
		{
				$this->userRepo = $userRepo;
		}

		public function index(Request $request)
		{
				return view('profile.index', ['user' => $request->user()]);
		}

		public function update(Request $request)
		{
				$this->validate($request, [
						'firstname' => 'required|max:255',
						'lastname' => 'required|max:255',
						'email' => 'required|max:255',
						'password' => 'min:6'
				]);

				$user = $request->user();
				$this->userRepo->updateProfile($user, [
						'firstname' => $request->firstname,
						'lastname' => $request->lastname,
						'email' => $request->email,
						'password' => ($request->password) ? bcrypt($request->password) : $user->password
				]);

				return redirect('profile');
		}
}
