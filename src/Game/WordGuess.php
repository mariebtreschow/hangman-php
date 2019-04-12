<?php


namespace Game;


class WordGuess
{
    private $position;
    private $letterInWord;
    public static $counter = 0;

    public function __construct(int $position, string $letterInWord)
    {
        WordGuess::$counter++;
        $this->position = $position;
        $this->letterInWord = $letterInWord;

    }

    public function letter(): string
    {
        return $this->letterInWord;
    }

    public function position(): int
    {
        return $this->position;
    }
}