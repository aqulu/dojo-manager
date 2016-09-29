<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\UserRepository;
use App\Repositories\BeltRepository;
use App\Repositories\GroupRepository;
use App\Repositories\ExamRepository;
use App\User;
use App\Belt;
use App\Group;


class UserController extends Controller
{
		protected $userRepo;
		protected $groupRepo;
		protected $beltRepo;
		protected $examRepo;

		public function __construct(UserRepository $userRepo, GroupRepository $groupRepo, BeltRepository $beltRepo, ExamRepository $examRepo)
		{
				$this->userRepo = $userRepo;
				$this->groupRepo = $groupRepo;
				$this->beltRepo = $beltRepo;
				$this->examRepo = $examRepo;
		}

		public function index()
		{
				return view('users.index', ['users' => $this->userRepo->all()]);
		}

		public function detail(User $user)
		{
			$nextExam = $user->getNextExam();
			$possibleExam = ($nextExam) ? null : $this->examRepo->findNext(time(), $user->group);
			return view('users.detail', [ 'user' => $user, 'nextExam' => $nextExam, 'possibleExam' => $possibleExam ]);
		}

		public function edit(User $user)
		{
				$groups = $this->groupRepo->all();
				$belts = $this->beltRepo->all();
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
				if ($request->group) {
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
