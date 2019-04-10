<?php declare(strict_types=1);

use Game\GameOver;
use Game\Hangman;
use Game\Word;
use PHPUnit\Framework\TestCase;
use Game\Saldo;
use Game\WrongLetterException;

class DummyTest extends TestCase
{
    public function testDummy()
    {
        self::assertTrue(true);
    }

    /** @test */
    public function saldoCannotBeNegative()
    {
        self::expectException(Exception::class);
        Saldo::fromInt(-1);
    }

    /** @test */
    public function saldoIsPositiveAndReturnsAsInt()
    {
        $saldo = Saldo::fromInt(10000);
        self::assertEquals(1, $saldo->wordInString());
    }

    /** @test */
    public function saldoHasLenght()
    {
        $saldo = Saldo::fromInt(10000);
        self::assertEquals(5, $saldo->lenght());
    }

    /** @dataProvider trues */
    public function testAssertDataProvider(bool $true)
    {
        self::assertEquals(true, $true);
    }

    public function trues()
    {
        return [
            [true],[true],[true],[true]
        ];
    }

    public function testAfter0WrongGuessesWillReturnAttemptsLeft11()
    {
        $hangman = new Hangman(new Word('yes'));
        $attempts = $hangman->attemptsLeft();
        self::assertEquals(11, $attempts);
    }

    public function testAfter11WrongGuessesTheGameWillFail()
    {
        self::expectException(WrongLetterException::class);
        $hangman = new Hangman(new Word('jaume'));
        for ($x = 0; $x <= 11; $x++) {
            $hangman->guessLetter('z');
        }
        $attempts = $hangman->attemptsLeft();
        self::expectException(GameOver::class);
        self::assertEquals(0, $attempts);

    }

    public function testAfterWrongGuessesItShouldNotRevealALetterReturnAttemptsLeft()
    {
        self::expectException(WrongLetterException::class);
        $hangman = new Hangman(new Word('jaumemarie'));
        $hangman->guessLetter('z');

        $attempts = $hangman->attemptsLeft();
        self::assertEquals(10, $attempts);

    }

    public function testItRevealsALetterOnCorrectGuess()
    {
        $hangman = new Hangman(new Word('marie'));
        $guessedLetter = $hangman->guessLetter('a');
        self::assertEquals($guessedLetter, 'a');
    }

    public function testItRevealsALetterOnCorrectGuessSecondGuess()
    {
        $hangman = new Hangman(new Word('marie'));
        $guessedLetter = $hangman->guessLetter('r');
        self::assertEquals($guessedLetter, 'r');
    }

    public function testWhenGuessingAllTheCorrectWordsGameWin()
    {
        //when guessed all indexes return win
    }
}

