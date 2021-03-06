<?php declare(strict_types=1);

namespace App\Security;

use App\Entity\User as DOMJudgeUser;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{

    public function checkPreAuth(UserInterface $user): void
    {
        // Nothing to check.
    }

    public function checkPostAuth(UserInterface $user): void
    {
        if (!$user instanceof DOMJudgeUser) {
            return;
        }

        if (!$user->getEnabled()) {
            throw new DisabledException();
        }
    }
}
