<?php

namespace App\FormatData;

class Context
{
    private FormatInterface $strategy;
    private array $objects;

    public function __construct(FormatInterface $strategy, array $objects)
    {
        $this->setStrategy($strategy);
        $this->objects = $objects;
    }

    public function setStrategy(FormatInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy(): array
    {
        return $this->strategy->format($this->objects);
    }
}
