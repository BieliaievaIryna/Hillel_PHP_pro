<?php

namespace App\FormatData;

class Context
{
    private FormatInterface $strategy;
    private array $collection = [];

    public function __construct(FormatInterface $strategy, array $collection = [])
    {
        $this->setStrategy($strategy);
        $this->setCollection($collection);
    }

    public function setStrategy(FormatInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function setCollection(array $collection): void
    {
        $this->collection = $collection;
    }

    public function executeStrategy(): array
    {
        $formattedResult = $this->strategy->format($this->collection);

        $className = pathinfo(str_replace('\\', '/', get_class($this->strategy)), PATHINFO_BASENAME);

        return [
            'name' => $className . '_' . $this->strategy->formatDate() . '.txt',
            'text' => $formattedResult,
        ];
    }
}
