<?php
echo "<pre>";

class BankAccount
{
    protected $stanje;
    protected $blokiran = false;
    protected $limit = -200;
    protected $provizija = 0;

    public function __construct($stanje)
    {
        $this->stanje = $stanje;
    }

    public function ispisiStanje()
    {
        echo "Vase stanje na racunu je: $this->stanje RSD<br>";
    }

    public function uplatiNovac($novac)
    {
        $this->stanje += $novac;
        $this->stanje -= ($novac * ($this->provizija));

        if ($this->stanje >= 0 && $this->blokiran == true) {
            $this->blokiran = false;
            echo "Racun je odblokiran, stanje: $this->stanje RSD<br>";
        } else if ($this->blokiran == false) {
            echo "Stanje: $this->stanje RSD<br>";
        } else if ($this->blokiran == true) {
            echo "Stanje: $this->stanje RSD<br>";
        }
    }

    public function podigniNovac($novac)
    {
        if ($this->blokiran) {
            echo "Racun je blokiran, ne mozete da podignete novac <br>";
        } else {
            $this->stanje -= $novac;
            $this->stanje -= ($novac * ($this->provizija));
            if ($this->stanje <= $this->limit) {
                $this->blokiran = true;
                echo "Racun je blokiran, stanje: $this->stanje RSD<br>";
            } else {
                echo "Stanje $this->stanje RSD<br>";
            }
        }
    }
}

class User
{
    private $ime;
    private $prezime;
    private $racun1;
    private $racun2;

    public function __construct($ime, $prezime)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->racun1 = new SimpleBankAccount(0);
        $this->racun2 = new SecuredBankAccount(0);
    }

    public function getSimpleRacun()
    {
        return $this->racun1;
    }
    public function getSecuredRacun()
    {
        return $this->racun2;
    }
}

class SimpleBankAccount extends BankAccount
{
}

class SecuredBankAccount extends BankAccount
{
    protected $limit = -1000;
    protected $provizija = 0.025;
}

$nikola = new User("Nikola", "Babic");


$nikola->getSecuredRacun()->uplatiNovac(1000);
// $nikola->getSecuredRacun()->ispisiStanje();
$nikola->getSecuredRacun()->podigniNovac(1500);
$nikola->getSecuredRacun()->uplatiNovac(300);
$nikola->getSecuredRacun()->podigniNovac(500);
$nikola->getSecuredRacun()->uplatiNovac(300);
$nikola->getSecuredRacun()->uplatiNovac(300);
$nikola->getSecuredRacun()->uplatiNovac(500);
echo "<br>";
$nikola->getSimpleRacun()->uplatiNovac(1000);
$nikola->getSimpleRacun()->podigniNovac(1500);
$nikola->getSimpleRacun()->uplatiNovac(300);
$nikola->getSimpleRacun()->podigniNovac(500);
$nikola->getSimpleRacun()->uplatiNovac(300);
$nikola->getSimpleRacun()->uplatiNovac(300);
$nikola->getSimpleRacun()->ispisiStanje();
$nikola->getSimpleRacun()->podigniNovac(500);
$nikola->getSimpleRacun()->uplatiNovac(200);
echo "</pre>";
