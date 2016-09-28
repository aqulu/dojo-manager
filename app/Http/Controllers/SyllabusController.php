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
				$allBelts = $this->beltRepo->all();

				if ($request->beltId) {
					$belt = $this->beltRepo->findById($request->beltId);
				} else {
					$belt = ($request->user()->belt) ? $this->beltRepo->findNext($request->user()->belt) : $allBelts->first();
				}
				$group = ($request->groupName) ? $this->groupRepo->findByName($request->groupName) : $request->user()->group;

				return view('syllabus.index', [
					'groups' => $this->groupRepo->all(),
					'belts' => $this->beltRepo->all(),
					'program' => $this->syllabusRepo->find($belt, $group)
				]);
		}

		public function edit(Syllabus $program)
		{
				return view('syllabus.edit', [
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
				return redirect('syllabus/'.$program->id.'/edit');
		}

		public function delete(Syllabus $program, SyllabusEntry $entry)
		{
				$entry->delete();
				return redirect('syllabus/'.$program->id.'/edit');
		}
}
