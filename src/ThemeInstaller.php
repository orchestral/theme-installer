<?php namespace Orchestra\ThemeInstaller;

use Illuminate\Support\Arr;
use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ThemeInstaller extends LibraryInstaller
{
    /**
     * {@inheritdoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $name = Arr::get($package->getExtra(), 'theme-name');

        if (is_null($name)) {
            list(, $name) = $package->getPrettyName();

            $name = str_replace('-theme', '', $name);
        }

        return 'public/themes/'.$name;
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageBasePath(PackageInterface $package)
    {
        $path = parent::getPackageBasePath($package);

        return "{$path}/src";
    }

    /**
     * {@inheritdoc}
     */
    public function supports($packageType)
    {
        return in_array($packageType, ['orchestra-theme', 'orchestraplatform-theme']);
    }
}
