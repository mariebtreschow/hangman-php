<?php

namespace Game;

class Hangman
{
    private $word;
    private $hiddenWord;

    private $attempts = 11;

    public function __construct(Word $word)
    {
        $this->word = $word->wordInString();
        $this->hiddenWord = $word->wordInArray();
    }

    public function attemptsLeft(): int
    {
        return $this->attempts;
    }

    public function guessLetter($guessedLetter): string
    {
        $correctGuess = '';

        if ($this->attempts === 0) {
            throw new GameOver();
        }

        if (!in_array($guessedLetter, $this->hiddenWord)) {
            $this->attempts -= 1;
            throw new WrongLetterException();
        }

        foreach ($this->hiddenWord as $position => $letterInWord) {
            if ($guessedLetter === $letterInWord) {
                $correctGuess = new WordGuess($position, $letterInWord);
            }
        }
        // return full word when correct
        return $correctGuess->letter();
    }
}

