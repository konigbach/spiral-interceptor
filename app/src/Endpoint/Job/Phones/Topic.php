<?php declare(strict_types=1);

namespace App\Endpoint\Job\Phones;

use Psr\Log\LoggerInterface;
use Spiral\Queue\JobHandler;

class Topic extends JobHandler
{
    public function invoke(
        string $id,
        mixed $payload,
        array $headers,
        LoggerInterface $logger,
    ): void {
        $logger->info('Topic handler invoked');
    }
}
