<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
		public function all()
		{
				return User::orderBy('group_id')->orderBy('lastname')->get();
		}
}
