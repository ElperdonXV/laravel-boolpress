<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(faker $faker)
    {
        $newUser = new User();
        $newUser->name = 'Admin';
        $newUser->email = 'admin@admin.it';
        $string = '12345678';
        $newUser->password = Hash::make($string);
        $newUser->save();
        for($i=0; $i<5; $i++){
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $string = '123_FC76';
            $newUser->password = Hash::make($string);
            $newUser->save();
        }
    }
}
