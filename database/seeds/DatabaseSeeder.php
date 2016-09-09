<?php

use Illuminate\Database\Seeder;

use App\Belt;
use App\Category;
use App\Content;
use App\ExamProgram;
use App\Group;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				$this->call(CategoriesTableSeeder::class);
				$this->call(ContentsTableSeeder::class);
				$this->call(BeltsTableSeeder::class);
				$this->call(GroupsTableSeeder::class);
				$this->call(ExamProgramsTableSeeder::class);
				$this->call(UsersTableSeeder::class);
				$this->call(ContentExamProgramSeeder::class);
    }
}

class CategoriesTableSeeder extends Seeder
{
		public function run()
		{
				DB::table('categories')->delete();
				Category::insert(['name' => 'Kihon']);
				Category::insert(['name' => 'Kata']);
				Category::insert(['name' => 'Kumite']);
				Category::insert(['name' => 'Renzokuwaza']);
				Category::insert(['name' => 'Diverses']);
		}
}

class ContentsTableSeeder extends Seeder
{
		public function run()
		{
				DB::table('contents')->delete();
				$kihonCat = Category::where('name', 'Kihon')->first();
				if ($kihonCat) {
						Content::insert([ 'name' => 'Sonobazuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Nanamezuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Junzuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Kette Junzuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Gyakuzuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Kette Gyakuzuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Junzuki no Tsukkomi', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Kette Junzuki no Tsukkomi', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Gyakuzuki no Tsukkomi', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Kette Gyakuzuki no Tsukkomi', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Tobikomizuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Nagashizuki', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Jodanuke', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Gedanbarai', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Uchiuke', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Sotouke', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Maegeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Mawashigeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Sokutogeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Ushirogeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Uramawashigeri', 'description' => '', 'category_id' => $kihonCat->id ]);
				}

				$kataCat = Category::where('name', 'Kata')->first();
				if ($kataCat) {
						Content::insert([ 'name' => 'Kihon Kata', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Pinan Shodan', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Pinan Nidan', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Pinan Sandan', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Pinan Yondan', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Pinan Godan', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Naihanchi', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Kushanku', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Seishan', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Chinto', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Niseishi', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Jion', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Jitte', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Wanshu', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Bassai', 'description' => '', 'category_id' => $kataCat->id ]);
						Content::insert([ 'name' => 'Rohai', 'description' => '', 'category_id' => $kataCat->id ]);
				}
		}
}

class BeltsTableSeeder extends Seeder
{
		public function run()
		{
				DB::table('belts')->delete();
				Belt::insert([
					'ordering' => 0,
					'rank' => 9,
					'type' => 'Kyu',
					'color_hex' => '#FFFFFF'
				]);
				Belt::insert([
					'ordering' => 1,
					'rank' => 8,
					'type' => 'Kyu',
					'color_hex' => '#FFF45E'
				]);
				Belt::insert([
					'ordering' => 2,
					'rank' => 7,
					'type' => 'Kyu',
					'color_hex' => '#FFC20D'
				]);
				Belt::insert([
					'ordering' => 3,
					'rank' => 6,
					'type' => 'Kyu',
					'color_hex' => '#00CC0E'
				]);
				Belt::insert([
					'ordering' => 4,
					'rank' => 5,
					'type' => 'Kyu',
					'color_hex' => '#0058CC'
				]);
				Belt::insert([
					'ordering' => 5,
					'rank' => 4,
					'type' => 'Kyu',
					'color_hex' => '#BD00B0'
				]);
				Belt::insert([
					'ordering' => 6,
					'rank' => 3,
					'type' => 'Kyu',
					'color_hex' => '#945400'
				]);
				Belt::insert([
					'ordering' => 7,
					'rank' => 2,
					'type' => 'Kyu',
					'color_hex' => '#945400'
				]);
				Belt::insert([
					'ordering' => 8,
					'rank' => 1,
					'type' => 'Kyu',
					'color_hex' => '#945400'
				]);
				for ($i = 0; $i < 10; $i++) {
						Belt::insert([
							'ordering' => 9 + $i,
							'rank' => 1 + $i,
							'type' => 'Dan',
							'color_hex' => '#000000'
						]);
				}
		}
}

class GroupsTableSeeder extends Seeder
{
		public function run()
		{
				Group::insert(['name' => 'Erwachsene']);
				Group::insert(['name' => 'Kinder']);
				Group::insert(['name' => 'Insieme']);
		}
}

class ExamProgramsTableSeeder extends Seeder
{
		public function run()
		{
				$groups = Group::all();
				$belts = Belt::all();
				foreach ($groups as $group) {
						foreach ($belts as $belt) {
								ExamProgram::insert(['group_id' => $group->id, 'belt_id' => $belt->id]);
						}
				}
		}
}

class UsersTableSeeder extends Seeder
{
		public function run()
		{
				$group = Group::where('name', 'Erwachsene')->first();
				$belt = Belt::where([['rank', 3], ['type', 'Dan']])->first();
				User::insert([
						'firstname' => 'Admin',
						'lastname' => 'Admin',
						'email' => 'me@aqu.lu',
						'password' => '$2y$10$IywZ13IYEvwQteGtGbiOlOCBIJi7Vs.4FXOsaqHl8tDd6HoHfaks.',
						'belt_id' => $belt->id,
						'group_id' => $group->id,
						'instructor' => true,
						'admin' => true,
				]);
		}
}

class ContentExamProgramSeeder extends Seeder
{
		public function run()
		{
				$adults = 'Erwachsene';
				$kids = 'Kinder';
				$disabled = 'Insieme';

				$allPrograms = [
						[
								'group' => $adults,
								'ordering' => 1,
								'contents' => ['Sonobazuki', 'Junzuki', 'Gyakuzuki', 'Jodanuke', 'Sotouke', 'Uchiuke', 'Gedanbarai', 'Kihon Kata']
						],
						[
								'group' => $adults,
								'ordering' => 2,
								'contents' => ['Junzuki', 'Gyakuzuki', 'Junzuki no Tsukkomi', 'Pinan Nidan']
						],
						[
								'group' => $adults,
								'ordering' => 3,
								'contents' => ['Junzuki', 'Gyakuzuki', 'Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Pinan Shodan']
						],
						[
								'group' => $adults,
								'ordering' => 4,
								'contents' => ['Kette Junzuki', 'Kette Gyakuzuki', 'Kette Junzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Pinan Sandan']
						],
						[
								'group' => $adults,
								'ordering' => 5,
								'contents' => ['Kette Junzuki', 'Kette Gyakuzuki', 'Kette Junzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Pinan Yondan']
						],
						[
								'group' => $adults,
								'ordering' => 6,
								'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Pinan Godan']
						],
						[
								'group' => $adults,
								'ordering' => 7,
								'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Pinan Godan', 'Naihanchi']
						],
						[
								'group' => $adults,
								'ordering' => 8,
								'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Pinan Godan', 'Kushanku']
						],
				];

				foreach ($allPrograms as $program) {
						$examProgram = $this->findExamProgram($program['group'], $program['ordering']);
						$this->linkContents($examProgram, $program['contents']);
				}
		}

		public function findExamProgram($groupName, $beltOrdering) {
				return ExamProgram::where([
						['group_id', Group::where('name', $groupName)->first()->id],
						['belt_id', Belt::where('ordering', $beltOrdering)->first()->id]
				])->first();
		}

		public function linkContents($program, $contentNames)
		{
				$contents = Content::whereIn('name', $contentNames)->get(['id']);
				// foreach ($contents as $content) {
				// 		error_log($content);
				// }
				$program->contents()->attach($contents);
				$program->save();
		}
}
