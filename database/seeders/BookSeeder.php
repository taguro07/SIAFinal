<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(10)->create();

        // $books =[
        //     [
        //         'image'=> '',
        //         'tile'=> 'waves of memories',
        //         'author'=> 'jonaxx',
        //         'description'=> 'a dark journey through the mind of a young girl as she attempts to chase her loss memory. Nineteen-year-old Thraia Gabriella Fortunato lives in Costa Leona.',
        //         'rental_fee' => '12.00'
        //     ]
        // ];
    }
}
