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
				return view('users.edit', ['user' => $user, 'belts' => $this->beltRepo->all(), 'groups' => $this->groupRepo->all()]);
		}

		public function update(Request $request, User $user)
		{
				$this->validate($request, [
						'firstname' => 'required|max:255',
						'lastname' => 'required|max:255'
				]);

				$this->userRepo->update($user, $request->belt, $request->group, [
						'firstname' => $request->firstname,
						'lastname' => $request->lastname,
						'admin' => ($request->admin) ? true : false,
						'instructor' => ($request->instructor) ? true : false
				]);

				return redirect('users/'.$user->id);
		}

		public function delete(User $user) {
				$this->userRepo->delete($user);
				return redirect('users');
		}
}
