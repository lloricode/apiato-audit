<?php

namespace App\Containers\Audit\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use Apiato\Core\Foundation\Facades\Apiato;

class AuditPersmissionSeeder_1 extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['list-audits', 'Get All Audits.']);
    }
}
