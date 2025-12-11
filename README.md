# Project Spectrumvisie - Materiaalbeheer

## Projectomschrijving
Spectrumvisie biedt ondersteuning en begeleiding aan kinderen en jongeren met autisme, hun ouders en professionals.  
We leiden begeleiders en leerkrachten op om met onze methodiek **Jouw Autisme psycho-educatie** te kunnen werken en helpen ouders en begeleiders de juiste ondersteuning te bieden.  
Daarnaast verzorgen we trainingen en lezingen in het thema **‘Anders kijken naar gedrag’**.

Dit project richt zich op het digitaal beheren en tonen van trainingsmateriaal, zodat zowel trainers, ouders als leerlingen toegang hebben tot de juiste content.

---

## Doel van het project
Het doel van dit project is het ontwikkelen van een webapplicatie waarmee:
- Materiaal geüpload en gecategoriseerd kan worden
- Rollen en permissies beheerd worden om te bepalen wie materiaal kan bekijken of downloaden
- Materialen veilig gedeeld kunnen worden zonder dat ongeautoriseerde gebruikers toegang krijgen

---

## Functionaliteiten
- Uploaden van bestanden en YouTube-links
- Categoriseren van materiaal
- Rollen en permissies instellen (wie mag bekijken/downloaden)
- Overzichtspagina’s per categorie
- Materialen bekijken of downloaden afhankelijk van toegangsrechten

---

## Gebruikersrollen
- **Admin**: volledige toegang, kan materiaal uploaden en gebruikers beheren
- **Begeleider / Leerkracht / Ouders**: beperkte toegang, afhankelijk van de ingestelde permissies

---

## Integratie
Het project is ontworpen met het oog op integratie met bestaande systemen van de klant. Het **Integratieplan** begeleidt de technische medewerker bij het overzetten van data en het instellen van de applicatie.

---

## Installatie en Gebruik
1. Clone de repository: 
```
git clone <repository-url>
```
2. Installeer dependencies met: 
```
composer install
```
en
```
npm install
```
3. Configureer de `.env` file met de juiste database en opslaginstellingen  
4. Run migraties en seeders om de database op te zetten: 
```
php artisan migrate --seed
``` 
en 
``` 
php artisan storage:link
```
5. Start de applicatie met: 
```
php artisan serve
```
en
```
npm run dev
```
