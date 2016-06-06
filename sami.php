<?php
require __DIR__.'/vendor/autoload.php';
use Sami\Sami;
use Symfony\Component\Finder\Finder;
use Sami\Version\GitVersionCollection;
use Sami\RemoteRepository\GitHubRemoteRepository;
$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('stubs')
    ->in($dir = __DIR__.'/app');
$versions = GitVersionCollection::create($dir)
    ->add('master', 'Laravel Dev');
return new Sami($iterator, array(
    'title' => 'YourBestGame API',
    'versions' => $versions,
    'build_dir' => __DIR__.'/build/%version%',
    'cache_dir' => __DIR__.'/cache/%version%',
    'default_opened_level' => 2,
    'remote_repository' => new GitHubRemoteRepository('OscarDuranX/YourBestGame', dirname($dir)),
));