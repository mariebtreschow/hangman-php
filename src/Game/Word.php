<?php

namespace Game;

class Word
{
    private $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function wordInString(): string
    {
        return $this->word;
    }
    public function wordInArray(): array
    {
        return str_split($this->word);
    }
}