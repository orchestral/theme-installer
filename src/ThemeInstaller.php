<?php namespace Orchestra\ThemeInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ThemeInstaller extends LibraryInstaller
{
    public function getPackageBasePath(PackageInterface $package)
    {
        return 'public/themes/'.$package->getPrettyName();
    }

    public function supports($packageType)
    {
        return in_array($packageType, ['orchestra-theme', 'orchestraplatform-theme']);
    }
}
