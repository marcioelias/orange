<?php

namespace App\Services;

use App\Services\Vendor\MagnusBilling;
use Illuminate\Database\Eloquent\Model;

class MagnusBillingDataService {
    protected $apiPublicUrl;
    protected $apiKey;
    protected $apiSecret;
    protected $apiEndpoint;
    protected $apiParams;
    protected $apiInstance;
    protected $model;

    public function __construct() {
        $this->apiPublicUrl = env('MAGNUS_API_URL', '');
        $this->apiKey = env('MAGNUS_API_KEY', '');
        $this->apiSecret = env('MAGNUS_API_SECRET', '');
    }

    protected function getInstance() {
        $instance =  new MagnusBilling(
            $this->apiKey,
            $this->apiSecret
        );

        $instance->public_url = $this->apiPublicUrl;
        extract($this->apiParams);
        $instance->setFilter($field, $value, $comparison, $type);
        return $instance;
    }

    protected function callApi() {
        $instance = $this->getInstance();
        return $instance->read($this->apiEndpoint);
    }

    protected function getRecordKeys($record) {
        //
    }

    protected function getRecordData($record) {
        //
    }

    public function handle() {
        foreach ($this->callApi()['rows'] as $record) {
            $this->model::updateOrCreate($this->getRecordKeys($record), $this->getRecordData($record));
        }
    }

    public function setModel(string $model) {
        $this->model = $model;
    }

    public function setApiEndpoint(string $apiEndpoint) {
        $this->apiEndpoint = $apiEndpoint;
    }

    public function setApiParams(array $apiParams) {
        $this->apiParams = $apiParams;
    }
}
