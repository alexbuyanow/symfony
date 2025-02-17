<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Bridge\Brevo\Transport;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

/**
 * @author Pierre TANGUY
 */
final class BrevoSmtpTransport extends EsmtpTransport
{
    public function __construct(string $username, #[\SensitiveParameter] string $password, EventDispatcherInterface $dispatcher = null, LoggerInterface $logger = null)
    {
        // This is not a typo: For now the smtp relay is still under sendinblue.com unlike the api.
        parent::__construct('smtp-relay.sendinblue.com', 465, true, $dispatcher, $logger);

        $this->setUsername($username);
        $this->setPassword($password);
    }
}
