<?php

namespace AppBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TryToOverrideSubServiceParameterPass implements CompilerPassInterface
{
    private const BUGGED_SERVICES = [
        'app.first_bugged_sub_class' => 1,
        'app.second_bugged_sub_class' => '$additionalParameter',
    ];

    private const OVERRIDE_VALUE = 'a third parameter';

    public function process(ContainerBuilder $container)
    {
        foreach (self::BUGGED_SERVICES as $serviceId => $argument) {
            try {
                $service = $container->getDefinition($serviceId);

                $service->replaceArgument($argument, array_merge(
                    $service->getArgument($argument),
                    self::OVERRIDE_VALUE
                ));
            } catch (\Exception $e) {
                dump(
                    $e->getMessage(),
                    sprintf(
                        'An issue occurs when we tried to replace %s parameter in the service %s',
                        $argument,
                        $serviceId
                    ),
                    sprintf('The current arguments are : %s', json_encode($service->getArguments()))
                );
            }
        }
    }

}