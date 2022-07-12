<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $data = [
            "taches" => "lavez les lit",
            "salle"=> "556245"
        ];
        $users  = User::all();
        foreach ($users as $user) {
            Event::create([
                'title' => $faker->name() ,
                'start' =>  Carbon::now(),
                'end' => Carbon::now()->addDay(rand(1,5)),
                "data"=> json_encode($data),
                "user_id"=>$user->id
            ]);
        }

    }
}
