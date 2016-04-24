<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
        Because Books will be associated with Authors,
        we need to seed Authors first
        */
        $this->call(TagsTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BookTagTableSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
