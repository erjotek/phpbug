<?php

namespace Anthill\Fetchers;

use Anthill\Connections\Connectors\Ssh;

final class TestFetcher
{
    public function fetch(): void
    {
        $connector = new Ssh();
        $connector->connect(SSH_IP, SSH_USER, SSH_PASS);
    }
}
