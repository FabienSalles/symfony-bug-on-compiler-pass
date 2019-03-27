<?php

namespace AppBundle;

use AppBundle\DependencyInjection\CompilerPass\TryToOverrideSubServiceParameterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TryToOverrideSubServiceParameterPass());
    }
}
