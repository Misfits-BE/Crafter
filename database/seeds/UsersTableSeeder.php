<?php

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository; 
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(
        PermissionRepository $permissionRepository, 
        RoleRepository $roleRepository, 
        UserRepository $userRepository
    ) {
        //! Vraag voor verversing van de databank zou moeten verplaatst worden
        //! Dit zou gevraagd moeten worden in DatabaseSeeder.php
        //! Omdat niet alleen gerelateerd is aan de gebruikers. 

        // TODO; (Localizatie) Nodig om het te bekijken om de commando outputs te vertalen. 

        // Ask for db migration refresh, default is no 
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear old data?')) {
            // Call the php artisan migrate:refresh command
            $this->command->call('migrate:refresh'); 
            $this->command->warn('Data cleared, starting from blank database.'); 
        }

        $permissions = [];

        foreach ($permissions as $perms) { // Seed default permissions
            $permissionRepository->seedFirstOrCreate(['name' => $perms]);
        }

        $this->command->info('Default permissions added.');

        // Confirm roles needed
        if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {
            // ask role form input 
            $inputRoles = $this->command->ask('Enter roles in comma seperated format.', 'admin,user'); 

            // Explode roles 
            $rolesArray = explode(',', $inputRoles); // BOOM!

            foreach ($rolesArray as $role) { // Add roles 
                $roles = $roleRepository->entity(); 
                $role  = $roleRepository->seedFirstOrCreate(['name' => trim($role)]);

                if ($role->name == 'admin') { // Assign all permissions 
                    $roles->syncPermissions($permissionRepository->all()); 
                    $this->command->info('Admin granted all permissions');
                } else { // For others by default only read access
                    $roles->syncPermissions(
                        $permissionRepository->entity()->where('name', 'LIKE', 'view_%')->get()
                    );
                }

                $userRepository->seedCreateUser($role, $this->command);
            }
        } else {
            $roleRepository->seedFirstOrCreate(['name' => 'user']); 
            $this->command->info('Added only default user role.');
        }
    }
}
