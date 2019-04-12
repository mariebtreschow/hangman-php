<?php

namespace Game;

class Hangman
{
    private $word;
    private $hiddenWord;
    private $wordGuessCollection;
    private $attempts = 11;

    public function __construct(Word $word, WordGuessCollection $wordGuessCollection)
    {
        $this->word = $word->wordInString();
        $this->wordGuessCollection = $wordGuessCollection;
        $this->hiddenWord = $word->wordInArray();
    }

    public function attemptsLeft(): int
    {
        return $this->attempts;
    }

    public function length(): int
    {
        return sizeof($this->hiddenWord);
    }

    public function wordGuessCollection()
    {
        return $this->wordGuessCollection;
    }

    public function guessLetter($guessedLetter): string
    {
        if ($this->attempts === 0) {
            throw new GameOver();
        }

        if (!in_array($guessedLetter, $this->hiddenWord)) {
            $this->attempts -= 1;
            throw new WrongLetterException();
        }

        foreach ($this->hiddenWord as $position => $letterInWord) {
            if ($guessedLetter === $letterInWord) {
                global $correctGuess;
                $correctGuess= new WordGuess();
                $correctGuess->setPosition($position);
                $correctGuess->setLetter($letterInWord);
                $this->wordGuessCollection->appendWordGuess($correctGuess);
            }
        }

        if ($this->length() == $correctGuess::$counter) {
            return $this->word;
        }

        return $correctGuess->letter();
    }
}

