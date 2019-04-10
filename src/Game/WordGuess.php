<?php


namespace Game;


class WordGuess
{
    private $position;
    private $letterInWord;

    public function __construct(int $position, string $letterInWord)
    {
        $this->position = $position;
        $this->letterInWord = $letterInWord;

    }

    public function letter(): string
    {
        return $this->letterInWord;
    }
}