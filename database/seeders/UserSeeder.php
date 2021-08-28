<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('123456789');
        $schools = School::all();

        $admin_user = User::factory()->make([
            'full_name' => 'admin',
            'email' => 'admin@admin.com',
            'school_id' => $schools->random()->id,
            'password' => $password

        ]);

        $more_admin_user = User::factory()->count(10)->make([
            'password' => $password,
            'school_id' => $schools->random()->id,
        ]);

        $more_admin_user->push($admin_user);

        DB::table('users')->insert($more_admin_user->toArray());
    }
}
