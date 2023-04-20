<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class BaseService
{
    protected function result(array $data, string $statusCode): array
    {
        $this->writeLog(json_encode((array) $this->getInfoContext($data)));

        $returningData = ['success' => true] + $data;

        return [
            'data' => $returningData,
            'httpCode' => $statusCode
        ];
    }

    private function writeLog($data): void
    {
        Log::info(get_class($this) . '->' . __FUNCTION__ . ' ' . $data);
    }

    private function getInfoContext(array $data)
    {
        $info = '';

        if (!empty($data['message'])) {
            $info = $data['message'];
        }

        return $info;
    }
}
