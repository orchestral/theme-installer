<?php

namespace Orchestra\ThemeInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class InstallerPlugin implements PluginInterface
{
    /**
     * Add Theme Installer to installation manager.
     *
     * @param  \Composer\Composer  $composer
     * @param  \Composer\IO\IOInterface  $io
     *
     * @return void
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ThemeInstaller($io, $composer);

        $composer->getInstallationManager()->addInstaller($installer);
    }
}
