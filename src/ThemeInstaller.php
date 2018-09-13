<?php

namespace Orchestra\ThemeInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ThemeInstaller extends LibraryInstaller
{
    /**
     * {@inheritdoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $name = $package->getExtra()['theme-name'] ?? null;

        if (is_null($name)) {
            [, $name] = $package->getPrettyName();

            $name = str_replace('-theme', '', $name);
        }

        return 'public/themes/'.$name;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($packageType)
    {
        return in_array($packageType, ['orchestra-theme', 'orchestraplatform-theme']);
    }
}
