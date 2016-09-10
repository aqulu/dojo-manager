<?php

use Illuminate\Database\Seeder;

use App\Belt;
use App\Category;
use App\Content;
use App\ExamProgram;
use App\ExamProgramEntry;
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
						Content::insert([ 'name' => 'Shutouke', 'description' => '', 'category_id' => $kihonCat->id ]);
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

				$kumiteCat = Category::where('name', 'Kumite')->first();
				if ($kumiteCat) {
						Content::insert([ 'name' => 'Sanbon Kumite 1', 'description' => 'Jodan Junzuki/Jodanuke-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 2', 'description' => 'Chudan Junzuki/Chudan Uchiuke-Enpi', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite Kinder 2', 'description' => 'Chudan Junzuki/Chudan Uchiuke-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 3', 'description' => 'Chudan Junzuki/Sotouke-Maegeri-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 4', 'description' => 'Jodan Junzuki/Jodan Uchiuke-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 5', 'description' => 'Maegeri/Sukuiuke-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 6', 'description' => 'Mawashigeri/ Jodan Uchiuke-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 7', 'description' => 'Jodan Junzuki/Jodan Uchiuke-Haishuuke-Jodan Urazuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 8', 'description' => 'Maegeri/Gedanbarai-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 9', 'description' => 'Chudan Junzuki/Chudanbarai-Uraken-Gyakuzuki', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Sanbon Kumite 10', 'description' => 'Jodan Junzuki/Shutouke-Haltegriff-Uraken', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Ipponme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Nihonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Sanbonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Yohonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Gohonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Ropponme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Nanahonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Hachihonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Kyuhonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Ohyo Kumite Jupponme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Ipponme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Nihonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Sanbonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Yohonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Gohonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Ropponme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Nanahonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Hachihonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Kyuhonme', 'description' => '', 'category_id' => $kumiteCat->id ]);
						Content::insert([ 'name' => 'Kihon Kumite Jupponme', 'description' => '', 'category_id' => $kumiteCat->id ]);
				}

				$renzokuwazaCat = Category::where('name', 'Renzokuwaza')->first();
				if ($renzokuwazaCat) {
						Content::insert([ 'name' => 'Orangegurt', 'description' => 'Maegeri/Mawashigeri/Gyakuzuki', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Grüngurt', 'description' => 'Tobikomizuki/Maegeri/Gyakuzuki', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Blaugurt', 'description' => 'Tobikomizuki/Maegeri/Mawashigeri/Gyakuzuki', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Blaugurt Kinder', 'description' => 'Jodanuke (Zenkutsudachi)/ Gedanbarai (Shikodashi)/Sotouke (Mahanmninekoashidashi)', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Violettgurt', 'description' => 'Maegeri/Mawashigeri/Ushirogeri/Gyakuzuki', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Braungurt 1', 'description' => 'Surikomi Maegeri/Gyakuzuki/Mawashigeri', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Braungurt 2', 'description' => 'Surikomi Sokutogeri/Ushirogeri/Mawashigeri/Gyakuzuki', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Braungurt Kinder 2', 'description' => 'Surikomi Maegeri/Gyakuzuki/Mawashigeri/Gyakuzuki', 'category_id' => $renzokuwazaCat->id ]);
						Content::insert([ 'name' => 'Braungurt 3', 'description' => 'Surikomi Sokutogeri/Ushirogeri/Mawashigeri/Gyakuzuki/Uraken', 'category_id' => $renzokuwazaCat->id ]);
				}

				$miscCat = Category::where('name', 'Diverses')->first();
				if ($miscCat) {
						Content::insert([ 'name' => 'Freikata', 'description' => '', 'category_id' => $miscCat->id ]);
						Content::insert([ 'name' => 'Gurtbinden', 'description' => '', 'category_id' => $miscCat->id ]);
						Content::insert([ 'name' => 'Jiyu Kumite', 'description' => 'Freikampf', 'category_id' => $miscCat->id ]);
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
				$all = [
						[
								'group' => 'Erwachsene',
								'programs' => [
										[
												'ordering' => 1,
												'contents' => ['Sonobazuki', 'Junzuki', 'Gyakuzuki', 'Jodanuke', 'Sotouke', 'Uchiuke', 'Gedanbarai', 'Sanbon Kumite 1', 'Sanbon Kumite 2', 'Kihon Kata']
										],
										[
												'ordering' => 2,
												'contents' => ['Junzuki', 'Gyakuzuki', 'Junzuki no Tsukkomi', 'Orangegurt', 'Sanbon Kumite 3', 'Sanbon Kumite 4', 'Ohyo Kumite Ipponme', 'Pinan Nidan']
										],
										[
												'ordering' => 3,
												'contents' => ['Junzuki', 'Gyakuzuki', 'Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Grüngurt', 'Sanbon Kumite 5', 'Sanbon Kumite 6', 'Ohyo Kumite Nihonme', 'Pinan Shodan']
										],
										[
												'ordering' => 4,
												'contents' => ['Kette Junzuki', 'Kette Gyakuzuki', 'Kette Junzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Blaugurt', 'Sanbon Kumite 7', 'Sanbon Kumite 8', 'Ohyo Kumite Sanbonme', 'Pinan Sandan']
										],
										[
												'ordering' => 5,
												'contents' => ['Kette Junzuki', 'Kette Gyakuzuki', 'Kette Junzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Violettgurt', 'Sanbon Kumite 9', 'Sanbon Kumite 10', 'Ohyo Kumite Yohonme', 'Pinan Yondan']
										],
										[
												'ordering' => 6,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Braungurt 1', 'Ohyo Kumite Gohonme', 'Ohyo Kumite Ropponme', 'Kihon Kumite Ipponme', 'Kihon Kumite Nihonme', 'Pinan Godan', 'Freikata']
										],
										[
												'ordering' => 7,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Pinan Godan', 'Braungurt 2', 'Ohyo Kumite Ropponme', 'Ohyo Kumite Nanahonme', 'Kihon Kumite Ipponme', 'Kihon Kumite Nihonme', 'Kihon Kumite Sanbonme', 'Pinan Godan', 'Naihanchi', 'Freikata']
										],
										[
												'ordering' => 8,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Pinan Godan', 'Braungurt 3', 'Ohyo Kumite Ropponme', 'Ohyo Kumite Nanahonme', 'Kihon Kumite Ipponme', 'Kihon Kumite Nihonme', 'Kihon Kumite Sanbonme', 'Pinan Godan', 'Kushanku', 'Freikata', 'Freikata']
										],
								]
						],
						[
								'group' => 'Kinder',
								'programs' => [
										[
												'ordering' => 1,
												'contents' => ['Sonobazuki', 'Junzuki', 'Jodanuke', 'Gedanbarai', 'Sanbon Kumite 1', 'Kihon Kata']
										],
										[
												'ordering' => 2,
												'contents' => ['Junzuki', 'Gyakuzuki', 'Junzuki no Tsukkomi', 'Sotouke', 'Uchiuke', 'Orangegurt', 'Sanbon Kumite Kinder 2', 'Pinan Nidan']
										],
										[
												'ordering' => 3,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Shutouke', 'Uchiuke', 'Grüngurt', 'Sanbon Kumite 5', 'Ohyo Kumite Ipponme', 'Pinan Shodan']
										],
										[
												'ordering' => 4,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Blaugurt Kinder', 'Sanbon Kumite 7', 'Sanbon Kumite 3', 'Ohyo Kumite Nihonme', 'Pinan Sandan']
										],
										[
												'ordering' => 5,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Shutouke', 'Violettgurt', 'Sanbon Kumite 8', 'Sanbon Kumite 10', 'Ohyo Kumite Sanbonme', 'Pinan Yondan']
										],
										[
												'ordering' => 6,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Violettgurt', 'Braungurt 1', 'Ohyo Kumite Yohonme', 'Ohyo Kumite Gohonme', 'Kihon Kumite Ipponme', 'Pinan Godan', 'Freikata', 'Jiyu Kumite']
										],
										[
												'ordering' => 7,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Violettgurt', 'Braungurt Kinder 2', 'Ohyo Kumite Gohonme', 'Ohyo Kumite Ropponme', 'Kihon Kumite Ipponme', 'Kihon Kumite Nihonme', 'Pinan Godan', 'Naihanchi', 'Freikata', 'Jiyu Kumite']
										],
										[
												'ordering' => 8,
												'contents' => ['Junzuki', 'Kette Junzuki', 'Gyakuzuki', 'Kette Gyakuzuki', 'Junzuki no Tsukkomi', 'Kette Junzuki no Tsukkomi', 'Gyakuzuki no Tsukkomi', 'Kette Gyakuzuki no Tsukkomi', 'Tobikomizuki', 'Nagashizuki', 'Braungurt 3', 'Ohyo Kumite Ropponme', 'Ohyo Kumite Nanahonme', 'Kihon Kumite Ipponme', 'Kihon Kumite Nihonme', 'Kihon Kumite Sanbonme', 'Pinan Godan', 'Kushanku', 'Freikata', 'Freikata', 'Jiyu Kumite']
										],
								]
						],
				];

				foreach ($all as $entry) {
						foreach ($entry['programs'] as $program) {
								$examProgram = $this->findExamProgram($entry['group'], $program['ordering']);
								$this->linkContents($examProgram, $program['contents']);
						}
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
				$i = 1;
				foreach ($contents as $contentId) {
						ExamProgramEntry::insert([
							'content_id' => $contentId,
							'exam_program_id' => $program->id,
							'ordering' => $i
						]);
						$i++;
				}
		}
}
