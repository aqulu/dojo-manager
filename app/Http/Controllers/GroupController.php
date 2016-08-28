<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Group;

class GroupController extends Controller
{

		public function index()
		{
				return $this->findByName(null);
		}

		public function findByName($name)
		{
				$groups = Group::all();
				$activeGroup = ($name) ? $groups->where('name', $name)->first() : $groups->first();
		    return view('groups.index', [
		        'groups' => $groups,
						'active' => $activeGroup
		    ]);
		}

		public function create(Request $request)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);
				Group::create(['name' => $reqest->name]);
				
				return $this->index();
		}
}
