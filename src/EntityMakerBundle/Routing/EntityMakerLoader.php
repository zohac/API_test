<?php

namespace App\EntityMakerBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class EntityMakerLoader extends Loader
{
    /**
     * {@inheritdoc}
     */
    public function load($resource, string $type = null)
    {
        $routes = new RouteCollection();

        $resource = '@EntityMakerBundle/Resources/config/routes/entity_maker.yaml';
        $type = 'yaml';

        $importedRoutes = $this->import($resource, $type);

        $routes->addCollection($importedRoutes);

        return $routes;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($resource, string $type = null)
    {
        return 'entity_maker' === $type;
    }
}
