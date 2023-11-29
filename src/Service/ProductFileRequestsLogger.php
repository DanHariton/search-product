<?php

declare(strict_types=1);

namespace App\Service;

class ProductFileRequestsLogger implements ILogger
{
    private const FILE_NAME = 'countProductRequests.txt';

    private string $filePath;

    private array $logs;

    public function __construct(string $loggerDirectory)
    {
        $this->filePath = $loggerDirectory . self::FILE_NAME;
    }

    public function log(string $id): void
    {
        $this->getLogs();
        $this->incrementCount($id);
    }

    public function getLogs(): array
    {
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }

        return $this->logs = json_decode(file_get_contents($this->filePath),true);
    }

    private function incrementCount(string $id): void
    {
        if (isset($this->logs[$id])) {
            $this->logs[$id]++;
        } else {
            $this->logs[$id] = 1;
        }

        $this->save();
    }

    private function save(): void
    {
        file_put_contents($this->filePath, json_encode($this->logs));
    }
}