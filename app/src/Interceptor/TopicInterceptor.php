<?php declare(strict_types=1);

namespace App\Interceptor;

use Psr\Log\LoggerInterface;
use Spiral\Core\CoreInterceptorInterface;
use Spiral\Core\CoreInterface;
use Spiral\Queue\QueueConnectionProviderInterface;

class TopicInterceptor implements CoreInterceptorInterface
{
    private const ROADRUNNER_DEFAULT_NAME = 'deduced_by_rr';

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly QueueConnectionProviderInterface $queueConnectionProvider,
    ) {
    }

    public function process(string $controller, string $action, array $parameters, CoreInterface $core): mixed
    {
        if ($controller !== self::ROADRUNNER_DEFAULT_NAME) {
            return $core->callAction($controller, $action, $parameters);
        }

        $topic = $parameters['queue'];

        $this->logger->debug(json_encode($parameters, JSON_THROW_ON_ERROR));

        $this->queueConnectionProvider->getConnection('sync')->push($topic, $parameters);

        return null;
    }
}
