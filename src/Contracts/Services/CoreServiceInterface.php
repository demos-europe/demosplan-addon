<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

interface CoreServiceInterface
{
    /**
     * @return LoggerInterface
     */
    public function getLogger();

    public function setLogger(LoggerInterface $logger);

    /**
     * @return Stopwatch
     */
    public function getStopwatch();

    public function setStopwatch(Stopwatch $stopwatch);

    /**
     * @return ManagerRegistry
     */
    public function getDoctrine();

    public function setDoctrine(ManagerRegistry $doctrine);
}
