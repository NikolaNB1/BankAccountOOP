# BankAccountOOP

Vezba 1

Napraviti klase BankAccount (predstavlja bankovni racun) i User (predstavlja osobu tj. korisnika).
Bankovni racun treba da je opisan trenutnim stanjem na racunu i poljem da li je blokiran ili ne.
Korisnik treba da je opisan imenom, prezimenom i svojim bankovnim racunom.
Inicijalni balans bankovnog racuna je 0.
Korisnik moze da podigne ili uplati novac na bankovni racun (osim ako bankovni racun nije blokiran).
Ukoliko stanje bankovnog racuna dostigne -200 ili manje, bankovni racun postaje blokiran sve dok korisnik ne uplati dovoljno sredstava tako da je racun na nuli.



Vezba 2

Prosiriti prvu vezbu, kreirati dve nove klase SimpleBankAccount i SecuredBankAccount koje nasledjuju BankAccount.
Razlika izmedju dve klase je sto kod SimpleBankAccount banka ne uzima proviziju, dok kod SecuredBankAccount uzima 2.5% i prilikom podizanja i uplacivanja novca. Takodje, kod SecuredBankAccount moguce je ici do -1000 balansa.
Prosiriti klasu User tako da sadrzi oba racuna.
