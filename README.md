## Vaated

Kuna kujundus ei olnud oluline, siis kopeerisin selle lihtsalt ühe vormi näite pealt (vt stiil) ning modifitseerisin seda natuke.
Ei hakanud aga palju süvenema, nii et kindlasti on seal üks jagu CSSi, mida ma ei kasuta.

form.blade.php - põhiline vormi vaade
success.blade.php - lihtsalt tagasiside leht õnnestumise puhul

Ebaõnnestumisel peab vormi uuesti täitma. Veateade tekib lahtri kohale. Õigesti sisestatud lahtrid jäävad täidetuks.

## Stiil

Referents: https://www.w3docs.com/tools/editor/5876

## Valideerimine

Valideerimise teostasin FormController.php failis, kus kontrollin lihtsamad vead ära. Samuti on selles failis eesti keelsed veateated.

Lisaks tegin kaks reeglit: IdCodeCheck.php ja PurposeCheck.php
Nendes on siis enda kirjutatud valideerimise reeglid:

1. Isikukoodi puhul kontrollin:
   a) et esimene number oleks 3-6
   b) et sünnikuupäev oleks reaalne kuupäev
   c) et sünnikuupäev ei oleks tulevikus - kuna vanust ei olnud täpsustatud, siis saavad hetkel imikud ka laenu võtta =)

2. Kasutuseesmärgi puhul vaid seda, et vähemalt üks ette antud sõnadest oleks tekstiväljas olemas

## Faili kirjutamine

Tõenäoliselt mitte parim ülesehitus, kuid sealt samast FormController.php kutsun välja ka faili kirjutamise funktsiooni writeToFile, mille panin abi moodulisse: helpers.php

Kirjutan väljundi json faili. Faili nime võtsin sisestatud nime järgi ning lisasin sinna algselt numbri "1" lõppu, mida dubleerimise korral lihtsalt suurendan. Täpitähed tulevad kahjuks kodeeritud kujul ja sellega ei ole täna enam jaksu võidelda.

## Testid

Kuna ei olnud eelnevalt ise automaatteste (vähemalt "unit teste") kirjutanud, siis tegin praktika mõttes mõne rohkem, kui nõutud.

"Webscrapinguga" on mul natuke rohkem kogemust ning seega tahtsin lisaks "e2e" testi teha, kuid kuna tegin kõike Windowsis WSL-i läbi, siis ei olnud kindel, kuidas Duski jaoks Chrome läbi WSL-i tööle panna. Samuti sain hulga vigasid üritades Cypressi peale panna. Seega jätsin need hetkel tegemata.

## Teegid

Tegin ülesandeid ette antud järjekorras ja jõudsin teekideni, kui kõik muu oli juba valmis. Seega hetkel ei kasutanud ühtegi, aga soovi korral võin proovida mõnda liidestada.
