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
        $results = [];
        foreach ($this->objects as $object) {
            $results[] = $this->strategy->format($object);
        }
        return $results;
    }
}
