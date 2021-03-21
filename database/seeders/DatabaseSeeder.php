<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\database\seeders\Traits\TruncateTable;

class DatabaseSeeder extends Seeder
{
    // use TruncateTable;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::unguard();

        // $this->truncateMultiple([
        //     'cache',
        //     'jobs',
        //     'sessions',
        // ]);

        // $this->call(PermissionRoleTableSeeder::class);
        // $this->call(UserRoleTableSeeder::class);

        Model::reguard();
        
    }
}
