<?php

namespace Anthill\Connections\Connectors;

class Ssh
{
    private $shell;
    private $session;

    public function connect(string $ip, string $login, string $password)
    {
        $session = ssh2_connect($ip, 22);

        if ($session !== false) {
            $this->session = $session;
        }

        if (!is_resource($this->session)) {
            die("Unable to connect to");
        }

        if (!ssh2_auth_password($this->session, $login, $password)) {
            die("Authentication data rejected");
        }

        //todo remove assignment to $this->shell or change to local variable
        $this->shell = ssh2_shell($this->session, 'xterm', null, 80, 0, SSH2_TERM_UNIT_CHARS);
//        $shell = ssh2_shell($this->session, 'xterm', null, 80, 0, SSH2_TERM_UNIT_CHARS);
    }

    //todo remove destruct or ssh2_disconnect
    public function __destruct()
    {
        ssh2_disconnect($this->session);
    }
}
