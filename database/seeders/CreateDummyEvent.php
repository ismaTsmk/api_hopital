<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            $event = Event::create([
                'title' => $faker->name() ,
                "salle"=> "salle n ° : ".rand(1,39),
                "service"=> "service n ° : ".rand(1,39),
                'start' =>  Carbon::now(),
                'end' => Carbon::now()->addDay(rand(1,5)),
                "data"=> $faker->text(200),
                // "user_id"=>$user->id
            ]);

            DB::table('associate_user_event')->Create([
                "user_id"=>$user->id,
                "event_id"=>$event->id,

            ]);
        }

    }
}
