<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */
namespace Spiral;

use Spiral\Core\DirectoriesInterface;
use Spiral\Modules\ModuleInterface;
use Spiral\Modules\PublisherInterface;
use Spiral\Modules\RegistratorInterface;

class ChartsModule implements ModuleInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(RegistratorInterface $registrator)
    {
        /**
         * Let's register new view namespace 'charts'.
         */
        $registrator->configure('views', 'namespaces.spiral', 'spiral/charts', [
            "directory('libraries') . 'spiral/charts/source/views/',",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function publish(PublisherInterface $publisher, DirectoriesInterface $directories)
    {
        $publisher->publishDirectory(
            __DIR__ . '/../resources/scripts/',
            $directories->directory('public') . 'resources/scripts',
            PublisherInterface::OVERWRITE
        );

        $publisher->publishDirectory(
            __DIR__ . '/../resources/styles/',
            $directories->directory('public') . 'resources/styles',
            PublisherInterface::OVERWRITE
        );
    }
}