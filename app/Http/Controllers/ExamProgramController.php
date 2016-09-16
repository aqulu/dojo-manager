<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Repositories\BeltRepository;
use App\Repositories\GroupRepository;
use App\Repositories\SyllabusRepository;
use App\Repositories\ContentRepository;
use App\Syllabus;
use App\SyllabusEntry;
use App\Belt;
use App\Group;
use App\User;
use App\Content;

class SyllabusController extends Controller
{
		protected $syllabusRepo;
		protected $beltRepo;
		protected $groupRepo;
		protected $contentRepo;

		public function __construct(SyllabusRepository $syllabusRepo, BeltRepository $beltRepo, GroupRepository $groupRepo, ContentRepository $contentRepo)
		{
				$this->beltRepo = $beltRepo;
				$this->groupRepo = $groupRepo;
				$this->syllabusRepo = $syllabusRepo;
				$this->contentRepo = $contentRepo;
		}

		public function index(Request $request)
		{
				$belt = ($request->beltId) ? $this->beltRepo->findById($request->beltId) : $this->beltRepo->findNext($request->user()->belt);
				$group = ($request->groupName) ? $this->groupRepo->findByName($request->groupName) : $request->user()->group;

				return view('examprograms.index', [
					'groups' => $this->groupRepo->all(),
					'belts' => $this->beltRepo->all(),
					'program' => $this->syllabusRepo->find($belt, $group)
				]);
		}

		public function edit(Syllabus $program)
		{
				return view('examprograms.edit', [
					'contents' => $this->contentRepo->all(),
					'groups' => $this->groupRepo->all(),
					'belts' => $this->beltRepo->all(),
					'program' => $program
				]);
		}

		public function update(Request $request, Syllabus $program)
		{
				if ($request->contents) {
						foreach($request->contents as $content) {
								SyllabusEntry::insert([
										'content_id' => $content,
										'syllabus_id' => $program->id,
										'ordering' => $program->entries->count() + 1
								]);
						}
				}
				return redirect('examprograms/'.$program->id.'/edit');
		}

		public function delete(Syllabus $program, SyllabusEntry $entry)
		{
				$entry->delete();
				return redirect('examprograms/'.$program->id.'/edit');
		}
}
