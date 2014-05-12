<?php


class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->truncate(); 
        DB::table('groups')->truncate();
        DB::table('users_groups')->truncate();

        Sentry::getUserProvider()->create(array(
            'email' => 'admin@admin.com',
            'password' => "admin",
            'first_name' => 'Yugan',
            'last_name' => 'Tharma',
            'activated' => 1,
        ));

        Sentry::getGroupProvider()->create(array(
            'name' => 'Admin',
            'permissions' => array('admin' => 1),
        ));

        // Assign user permissions
        $adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);
    }

}
