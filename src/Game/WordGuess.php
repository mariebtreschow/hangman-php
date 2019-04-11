<?php


namespace Game;


class WordGuess
{
    private $position;
    private $letterInWord;
    public static $counter = 0;

    public function __construct()
    {
        WordGuess::$counter++;
    }

    public function setPosition(int $position)
    {
        $this->position = $position;
    }

    public function setLetter(string $letterInWord)
    {
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