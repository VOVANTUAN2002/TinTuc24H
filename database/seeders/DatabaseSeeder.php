<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importUserGroups();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    public function importUserGroups(){
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 1';
        $userGroup->save();
        
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 2';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 3';
        $userGroup->save();
    }
}
