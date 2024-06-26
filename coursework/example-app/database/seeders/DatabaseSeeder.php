<?php

namespace Database\Seeders;
use App\Models\Booked_tours;
use App\Models\Role;
use App\Models\Status;
use App\Models\Status_application;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\StatusApplicationFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
         //\App\Models\User::factory(10)->create();
        Role::factory()
            ->count(2)
            ->sequence(
                ['name' => 'admin'],
                ['name' => 'user'],
            )
            ->create();
         User::factory()->create([
             'surname' => 'admin',
            'name' => 'admin',
             'email' => 'admin@example.com',
             'password'=>'adminadmin',
             'email_verified_at'=>NULL,
             'id_role'=>'1'
         ]);
         Status::factory()
             ->count(4)
             ->sequence(
                 ['name'=>'Новый'],
                 ['name'=>'Завершенный'],
                 ['name'=>'Горящий'],
                 ['name'=>'Вам понравится'],
             )->create();
        Status_application::factory()
            ->count(3)
            ->sequence(
                ['name'=>'На расссмотрении'],
                ['name'=>'Одобрено'],
                ['name'=>'Откланено'],
            )->create();

    }
}
