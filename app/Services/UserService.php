<?php

namespace App\Services;

use App\Services\MagnusBillingDataService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends MagnusBillingDataService {

    public function __construct() {
        parent::__construct();

        $this->setApiEndpoint('user');
        $this->setApiParams([
            'field' => 'id_group',
            'value' => '3',
            'comparison' => 'eq',
            'type' => 'numeric'
        ]);
        $this->setModel(User::class);

    }

    protected function getRecordKeys($record) {
        return [
            'username' => $record['username']
        ];
    }

    protected function getRecordData($record) {
        return [
            'name' => $record['firstname'] . ' ' . $record['lastname'],
            'password' => Hash::make($record['password']),
            'account_id' => (int)$record['id']
        ];
    }
}
