<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Repositories\BeltRepository;
use App\Repositories\GroupRepository;
use App\Repositories\SyllabusRepository;
use App\Repositories\SyllabusEntryRepository;
use App\Repositories\ContentRepository;
use App\Syllabus;
use App\SyllabusEntry;

class SyllabusController extends Controller
{
		protected $syllabusRepo;
		protected $syllabusEntryRepo;
		protected $beltRepo;
		protected $groupRepo;
		protected $contentRepo;

		public function __construct(SyllabusRepository $syllabusRepo, SyllabusEntryRepository $syllabusEntryRepo, BeltRepository $beltRepo, GroupRepository $groupRepo, ContentRepository $contentRepo)
		{
				$this->beltRepo = $beltRepo;
				$this->groupRepo = $groupRepo;
				$this->syllabusRepo = $syllabusRepo;
				$this->syllabusEntryRepo = $syllabusEntryRepo;
				$this->contentRepo = $contentRepo;
		}

		public function index(Request $request)
		{
				$allBelts = $this->beltRepo->all();
				$allGroups = $this->groupRepo->all();

				if ($request->beltId) {
						$belt = $this->beltRepo->findById($request->beltId);
				} else {
						$belt = ($request->user()->belt) ? $this->beltRepo->findNext($request->user()->belt) : $allBelts->first();
				}

				if ($request->groupName) {
						$group = $this->groupRepo->findByName($request->groupName);
				} else {
						$group = ($request->user()->group) ? $request->user()->group : $allGroups->first();
				}

				return view('syllabus.index', [
					'groups' => $allGroups,
					'belts' => $allBelts,
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
								$this->syllabusEntryRepo->insert([
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
				$this->syllabusEntryRepo->delete($entry);
				return redirect('syllabus/'.$program->id.'/edit');
		}
}
