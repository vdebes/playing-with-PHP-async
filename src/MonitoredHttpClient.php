<?php

namespace App;

use M6Web\Tornado\HttpClient;
use M6Web\Tornado\Promise;
use Psr\Http\Message\RequestInterface;

class MonitoredHttpClient implements HttpClient
{
    /** @var HttpClient */
    private $httpClient;
    private $requestCount = 0;
    private $processingTime = 0;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function sendRequest(RequestInterface $request): Promise
    {
        $this->requestCount++;
        $start = microtime(true);
        $promise = $this->httpClient->sendRequest($request);
        $end = microtime(true);
        $time = round(($end - $start) * 1000, 2);
        $this->processingTime += $time;
        echo "Requests sent: " . $this->requestCount . "\t Elapsed time: " . $this->processingTime . "ms\r";
        return $promise;
    }

    /**
     * @return int
     */
    public function getRequestCount(): int
    {
        return $this->requestCount;
    }

    /**
     * @return int
     */
    public function getProcessingTime(): int
    {
        return $this->processingTime;
    }

    public function __destruct()
    {
        echo "Requests sent: " . $this->requestCount . "\t Elapsed time: " . $this->processingTime . "ms \n";
    }
}
