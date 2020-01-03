<?php

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
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	$tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tableNames as $name) {
            $prefix = env('DB_PREFIX', '');

            if (substr($name, 0, strlen($prefix)) == $prefix) {
                $name = substr($name, strlen($prefix));
            }

            if ($name === 'migrations') {
                continue;
            }

            DB::table($name)->truncate();
        }

        $this->call(UsersSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(SubDistrictsTableSeeder::class);
        $this->call(VillagesTableSeeder::class);
        $this->call(EducationLevelsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
    }
}
