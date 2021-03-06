<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class RoleSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup role functionality for site setup';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $adminUser = User::where('email', 'admin@admin.com')->first();

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $adminUser->assignRole('admin');
    }
}
