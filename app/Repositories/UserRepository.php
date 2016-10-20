<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
		public function all()
		{
				return User::orderBy('group_id')->orderBy('lastname')->get();
		}

		public function findById($id)
		{
				return User::find($id);
		}

		public function update($user, $belt, $group, $attributes)
		{
				$user->fill($attributes);

				if ($belt) {
					$user->belt()->associate($belt);
				} else {
					$user->belt()->dissociate();
				}

				if ($group) {
					$user->group()->associate($group);
				} else {
					$user->group()->dissociate();
				}

				$user->save();

				return $user;
		}

		public function updateProfile($user, $attributes)
		{
				$user->fill($attributes);
				$user->save();
				return $user;
		}

		public function delete($user)
		{
				$user->delete();
		}
}
