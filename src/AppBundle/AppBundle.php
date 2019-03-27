<?php

namespace AppBundle;

use AppBundle\DependencyInjection\CompilerPass\TryToOverrideSubServiceParameterPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        // This fix my issue
        //$container->addCompilerPass(new TryToOverrideSubServiceParameterPass(), PassConfig::TYPE_OPTIMIZE, -1);

        // This does not
        $container->addCompilerPass(new TryToOverrideSubServiceParameterPass(), PassConfig::TYPE_OPTIMIZE, 1);
    }
}

