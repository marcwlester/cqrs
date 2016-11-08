<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 05/11/16
 * Time: 10:10 PM
 */

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
        );

//        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
//            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
//        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');

        $envParameters = $this->getEnvParameters();
        $loader->load(function (ContainerBuilder $container) use ($envParameters) {
            $container->getParameterBag()->add($envParameters);
        });

//        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
//            $loader->load(function (ContainerBuilder $container) {
//                $container->loadFromExtension('web_profiler', array(
//                    'toolbar' => true,
//                ));
//
//                $container->loadFromExtension('framework', array(
//                    'test' => true,
//                ));
//            });
//        }
    }
}
