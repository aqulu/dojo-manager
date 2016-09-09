<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Repositories\BeltRepository;
use App\Repositories\GroupRepository;
use App\Repositories\ExamProgramRepository;
use App\Belt;
use App\Group;
use App\User;

class ExamProgramController extends Controller
{
		protected $examProgramRepo;
		protected $beltRepo;
		protected $groupRepo;

		public function __construct(ExamProgramRepository $examProgramRepo, BeltRepository $beltRepo, GroupRepository $groupRepo)
		{
				$this->beltRepo = $beltRepo;
				$this->groupRepo = $groupRepo;
				$this->examProgramRepo = $examProgramRepo;
		}

		public function index(Request $request)
		{
				$belt = ($request->beltId) ? $this->beltRepo->findById($request->beltId) : $this->beltRepo->findNext($request->user()->belt);
				$group = ($request->groupName) ? $this->groupRepo->findByName($request->groupName) : $request->user()->group;
				return view('examprograms.index', [
					'groups' => $this->groupRepo->all(),
					'belts' => $this->beltRepo->all(),
					'program' => $this->examProgramRepo->find($belt, $group)
				]);
		}

}
