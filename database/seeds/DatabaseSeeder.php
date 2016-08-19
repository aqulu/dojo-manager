<?php

use Illuminate\Database\Seeder;

use App\Belt;
use App\Category;
use App\Content;

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
						Content::insert([ 'name' => 'Maegeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Mawashigeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Sokutogeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Ushirogeri', 'description' => '', 'category_id' => $kihonCat->id ]);
						Content::insert([ 'name' => 'Uramawashigeri', 'description' => '', 'category_id' => $kihonCat->id ]);
				}

				$kataCat = Category::where('name', 'Kata')->first();
				if ($kataCat) {
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
