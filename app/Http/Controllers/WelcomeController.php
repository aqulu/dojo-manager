<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ExamRepository;
use App\Repositories\BeltRepository;

class WelcomeController extends Controller
{
		protected $examRepo;
		protected $beltRepo;

		public function __construct(ExamRepository $examRepo, BeltRepository $beltRepo)
		{
				$this->examRepo = $examRepo;
				$this->beltRepo = $beltRepo;
		}

		public function index(Request $request)
		{
				$nextExam = $request->user()->getNextExam();
				$belt = ($request->user()->belt) ? $request->user()->belt : $this->beltRepo->all()->first();

		    return view('common.welcome', [
					'exam' => $nextExam,
					'belt' => ($nextExam) ? $this->beltRepo->findNext($belt) : $belt
				]);
		}

}
