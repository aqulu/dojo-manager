<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Repositories\BeltRepository;
use App\Repositories\GroupRepository;
use App\Repositories\ExamProgramRepository;
use App\Repositories\ContentRepository;
use App\ExamProgram;
use App\Belt;
use App\Group;
use App\User;
use App\Content;

class ExamProgramController extends Controller
{
		protected $examProgramRepo;
		protected $beltRepo;
		protected $groupRepo;
		protected $contentRepo;

		public function __construct(ExamProgramRepository $examProgramRepo, BeltRepository $beltRepo, GroupRepository $groupRepo, ContentRepository $contentRepo)
		{
				$this->beltRepo = $beltRepo;
				$this->groupRepo = $groupRepo;
				$this->examProgramRepo = $examProgramRepo;
				$this->contentRepo = $contentRepo;
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

		public function edit(ExamProgram $program)
		{
				return view('examprograms.edit', [
					'contents' => $this->contentRepo->all(),
					'groups' => $this->groupRepo->all(),
					'belts' => $this->beltRepo->all(),
					'program' => $program
				]);
		}

		public function update(ExamProgram $program)
		{
				return redirect('examprograms?groupName='.$program->group->name.'&beltId='.$program->belt->id);
		}

}
