<?php

namespace AppBundle\Example;

use Psr\Log\LoggerInterface;

class MyRootClass
{
    /** @var LoggerInterface */
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}