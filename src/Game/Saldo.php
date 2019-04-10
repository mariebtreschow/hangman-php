<?php declare(strict_types=1);

namespace Game;

class Saldo
{
    private $saldo;

    private function __construct(int $saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * @throws Exception
     */
    public static function fromInt(int $saldo): Saldo
    {
        if ($saldo < 0) {
            throw new \Exception();
        }

        return new Saldo($saldo);
    }

    public function wordInString(): int
    {
        return $this->saldo;
    }

    public function lenght(): int
    {
        return strlen((string) $this->saldo);
    }
}