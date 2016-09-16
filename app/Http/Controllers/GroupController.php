<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\GroupRepository;
use App\Group;

class GroupController extends Controller
{
		protected $groupRepo;

		public function __construct(GroupRepository $groupRepo)
		{
				$this->groupRepo = $groupRepo;
		}

		public function index()
		{
				return $this->findByName(null);
		}

		public function findByName($name)
		{
				$groups = $this->groupRepo->all();
				$activeGroup = ($name) ? $this->groupRepo->findByName($name) : $groups->first();

		    return ($activeGroup === null) ?
						redirect('groups/new') :
						view('groups.index', [
				        'groups' => $groups,
								'active' => $activeGroup
				    ]);
		}

		public function createNew()
		{
				$groups = Group::all();
		    return view('groups.new', [
		        'groups' => $groups
		    ]);
		}

		public function create(Request $request)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);
				Group::create(['name' => $request->name]);

				return redirect('groups/'.$request->name);
		}

		public function edit(Group $group)
		{
		    return view('groups.edit', [
		        'groups' => $this->groupRepo->all(),
						'active' => $group
		    ]);
		}

		public function update(Request $request, Group $group)
		{
				$this->validate($request, [
						'name' => 'required|max:255'
				]);
				$group->name = $request->name;
				$group->save();

				return redirect('groups/'.$group->name);
		}

		public function delete(Group $group)
		{
				$group->delete();
				return redirect('groups');
		}
}
