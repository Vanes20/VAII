# StoryLib

Vanesa Masaryková

5ZYR31

## Stručný opis projektu
Stránka bude fungovať ako repozitár na ukladanie a prípadné zdieľanie príbehov, nápadov či svetov. Je teda určená pre ľudí, ktorí sa venujú písaniu a tvoreniu fiktívnych svetov a chceli by miesto, kde by mali všetky svoje diela a nápady na jednom mieste.

## Role v projekte
Návštevník - Môže si prejsť verejne diela, avšak svoje vlastné vytvárať nemôže.
Registrovaný používateľ - Taktiež môže prechádzať verejne diela, ale môže vytvárať aj svoje vlastné a ukladať si ich pre seba alebo aj zverejniť ostatným.
Administrator - Je zodpovedná za správu a bezpečné fungovania aplikácie. Môže spravovať účty alebo vymazať (alebo iba skryť z verejných) diela, ktoré porušujú pravidlá.

## Prípady použitia podľa rolí
Návštevník
-Prehliadanie verejne dostupných príbehy a diel.
-Vyhľadávanie diel podľa názvu, autora, tagov.
-Registrácia

Registrovaný používateľ
- Prihlásenie alebo odhlásenie
- Vytvorenie nového diela
- Úprava diela
- Odstránenie diela
- Zverejnenie diela
- Prehliadanie verejne dostupných príbehy a diel.
- Vyhľadávanie diel podľa názvu, autora, tagov.

Administrator
- Zobrazenie zoznamu použivateľov
- Zobrazenie a spravovanie verejne dostupných diel
- Odstránenie diel
- Zablokovanie alebo odstránenie používateľov

## Plánované entity
Použivateľ
- Reprezentuje osobu, ktorá má vytvorený účet v aplikácii.

Hlavné atribúty:
- ID používateľa
- Používateľské meno
- Email
- Heslo
- Dátum registrácie

Vzťahy: 
Jeden používateľ môže vytvoriť viacero diel.


Dielo
Reprezentuje príbeh, nápad, text alebo iný obsah vytvorený používateľom.

Hlavné atribúty:
- ID diela
- Názov
- Obsah
- Opis
- Dátum vytvorenia
- Stav viditeľnosti
- ID autora

Vzťahy: 
Každé dielo patrí jednému používateľovi. Jeden používateľ môže mať viacero diel.


Kapitola
Reprezentuje jednu kapitolu v diele.

Hlavné atribúty:
- ID kapitoly
- Názov kapitoly
- Obsah
- ID diela

Vzťahy: 
Jedno dielo môže obsahovať viacero kapitol, ale každá kapitola patrí jednému dielu


## Vzťahy medzi entitami

Používateľ – Dielo (1:1): Jeden používateľ môže vytvoriť viacero diel, ale každé dielo má práve jedného autora.
Dielo – Kapitola (1:1): Jedno dielo môže mať viacero kapitol a jedna kapitola môže byť priradená jednému dielu.



## Hlavné stránky aplikácie
Úvodná stránka
- Úvodná stránka aplikácie s krátkym popisom webu a výberom najnovších alebo odporúčaných verejných diel.

Detail diela
- Stránka zobrazujúca názov, obsah, opis, autora a kategórie vybraného diela. Pri súkromných dielach bude prístup povolený iba autorovi a oprávnenému administrátorovi.

Používateľský profil
- Stránka s informáciami o používateľovi a zoznamom jeho verejných diel. 

Editor diela
- Stránka na vytváranie alebo editovanie diel. Bude obsahovať názov, popis, obsah a nastavenie viditeľnosti.

Registrácia a prihlásie
- Stránky umožňujúce vytvorenie používateľského účtu a prihlásenie do aplikácie.

Verejná knižnica
- Zoznam všetkých verejne dostupných diel. Používateľ môže diela prehliadať, vyhľadávať a filtrovať podľa kategórií.

## Rozdelenie funkcionality
Základné
- registrácia a prihlásenie
- Zobrazenie zoznamu verejných diel
- Vytváranie, úprava a vymazanie svojich diel
- Zobrazenie detailov o diele

Rozširujúce
- vyhľadávanie pomocou tagov
- ukladanie diel do záložiek
- úprava profilu
