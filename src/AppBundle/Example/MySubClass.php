<?php

namespace AppBundle\Example;


use Psr\Log\LoggerInterface;

class MySubClass extends MyRootClass
{
    /** @var array */
    protected $additionalParameter;

    public function __construct(LoggerInterface $logger, array $additionalParameter)
    {
        parent::__construct($logger);

        $this->additionalParameter = $additionalParameter;
    }
}