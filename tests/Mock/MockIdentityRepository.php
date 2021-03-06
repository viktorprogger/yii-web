<?php

declare(strict_types=1);

namespace Yiisoft\Yii\Web\Tests\Mock;

use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;

class MockIdentityRepository implements IdentityRepositoryInterface
{
    private ?IdentityInterface $identity;
    private bool $withException = false;

    public function __construct(?IdentityInterface $identity = null)
    {
        $this->identity = $identity;
    }

    public function findIdentity(string $id): ?IdentityInterface
    {
        if ($this->withException) {
            throw new \Exception();
        }

        return $this->identity;
    }

    public function findIdentityByToken(string $token, string $type): ?IdentityInterface
    {
        if ($this->withException) {
            throw new \Exception();
        }

        return $this->identity;
    }

    public function withException(): void
    {
        $this->withException = true;
    }
}
