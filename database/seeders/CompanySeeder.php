<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Company::factory(100)->create()
        ->each(function($company){
            $company->employees()->saveMany(Employee::factory()->count(rand(2,5))->create());
        });
    }
}
