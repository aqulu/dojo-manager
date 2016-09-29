<?php

namespace App\Http\Controllers;

use Validator;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ExamRepository;
use App\Repositories\GroupRepository;
use App\Exam;

class ExamController extends Controller
{
		protected $examRepo;
		protected $groupRepo;

		public function __construct(ExamRepository $examRepo, GroupRepository $groupRepo)
		{
				$this->examRepo = $examRepo;
				$this->groupRepo = $groupRepo;
		}

		public function index()
		{
				$exams = $this->examRepo->all();
		    return view('exams.index', [ 'exams' => $this->examRepo->all(), 'groups' => $this->groupRepo->all() ]);
		}

		public function edit(Request $request, Exam $exam)
		{
				return view('exams.edit', [
					'exam' => $exam,
					'groups' => $this->groupRepo->all(),
					'users' => $exam->group->users->diff($exam->nominees)
				]);
		}

		public function update(Request $request, Exam $exam)
		{
				$this->validate($request, [
						'group'	=> 'required',
						'time'	=> 'required|max:5',
						'date'	=> 'required|date'
				]);
				$exam->group_id = $request->group;
				$exam->examination_date = DateTime::createFromFormat('j.n.Y', $request->date);
				$exam->examination_time = $request->time;
				$exam->remarks = $request->remarks;
				$exam->save();
				return redirect('exams');
		}

		public function create(Request $request)
		{
				$this->validate($request, [
						'group'	=> 'required',
						'time'	=> 'required|max:5',
						'date'	=> 'required|date'
				]);

				Exam::insert([
					'group_id' => $request->group,
					'examination_date' => DateTime::createFromFormat('j.n.Y', $request->date),
					'examination_time' => $request->time,
					'remarks' => $request->remarks
				]);

				return redirect('exams');
		}

		public function delete(Request $request, Exam $exam)
		{
				$exam->delete();
				return redirect('exams');
		}

		public function addNominee(Request $request, Exam $exam)
		{
				$this->validate($request, [
						'userId'	=> 'required',
				]);
				$exam->nominees()->attach($request->userId);
				return redirect('exams/'.$exam->id.'/edit');
		}

		public function removeNominee(Exam $exam, $userId)
		{
				$exam->nominees()->detach($userId);
				return redirect('exams/'.$exam->id.'/edit');
		}
}
