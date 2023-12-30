<?php

declare(strict_types=1);

namespace Deployer;

require 'contrib/rsync.php';
require 'recipe/common.php';

set('rsync', [
    'exclude' => [
        '.git',
        'deploy.php',
    ],
    'exclude-file'  => false,
    'include'       => [],
    'include-file'  => false,
    'filter'        => [],
    'filter-file'   => false,
    'filter-perdir' => false,
    'flags'         => 'rz',
    'options'       => ['delete'],
    'timeout'       => 60,
]);

set('rsync_src', __DIR__ . '/dir');
set('rsync_dest', '{{release_path}}');

host('production')
    ->setHostname(getenv('DEPLOY_IP'))
    ->setRemoteUser(getenv('DEPLOY_USERNAME'))
    ->setDeployPath(getenv('DEPLOY_PATH'));

task('deploy', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:symlink',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success',
]);

after('deploy:failed', 'deploy:unlock');
