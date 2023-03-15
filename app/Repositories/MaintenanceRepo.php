<?php

namespace App\Repositories;

use App\Models\Maintenance;
use Exception;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Sanctum\PersonalAccessToken;

class MaintenanceRepository
{





    public function maintenancerequest($data)
    {
        //check the request if valid email
        $meaintenance = Maintenance::create($this->prepareDataForMaintenance($data));

        if (!$meaintenance) {
            throw new Exception("Sorry,not successful! Please try again.", 500);
        }
    }



    public function prepareDataForMaintenance(array $data): array
    {
        return [
            'name' => $data['name'],
            'description' => $data['description'],
        ];
    }
}
