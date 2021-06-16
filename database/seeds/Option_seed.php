<?php

use Illuminate\Database\Seeder;
use App\Model\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Option_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option')->delete();
        Option::create([
            'option_name' => 'blog_name',
            'option_value' => 'Publikasi Ilmiah',
        ]);

        DB::table('option')->delete();
        Option::create([
            'option_name' => 'tentang',
            'option_value' => 'Publikasi Ilmiah',
        ]);

        DB::table('option')->delete();
        Option::create([
            'option_name' => 'blog_logo',
            'option_value' => '',
        ]);
    }
}
