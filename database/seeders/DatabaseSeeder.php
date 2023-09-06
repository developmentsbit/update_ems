<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UsersSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuActionsTableSeeder::class);
        $this->call(UserMenuActionsTableSeeder::class);
        $this->call(OtpSmsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(AcademiccalenderTableSeeder::class);
        $this->call(AddclassTableSeeder::class);
        $this->call(ClassroutineTableSeeder::class);
        $this->call(HolidaylistTableSeeder::class);
        $this->call(SyllabusTableSeeder::class);
        $this->call(LessonplanTableSeeder::class);
        $this->call(SuggestionTableSeeder::class);
        $this->call(PrinciplesTableSeeder::class);
        $this->call(VicePrincipalMessagesTableSeeder::class);
    }
}