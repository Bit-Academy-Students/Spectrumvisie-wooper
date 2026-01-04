# Integratieplan – Materiaalplatform Spectrumvisie

## 1. Inleiding
Spectrumvisie biedt ondersteuning aan kinderen en jongeren met autisme, hun ouders en professionals. Daarnaast verzorgen ze trainingen en lezingen rondom het thema *Anders kijken naar gedrag*.  
Voor dit project is een digitaal platform ontwikkeld waarmee materialen, documenten en video's beheerd en gedeeld kunnen worden. Dit integratieplan opgesteld om de overdracht en implementatie soepel te laten verlopen.

## 2. Doel van het Integratieplan
Het integratieplan heeft drie hoofd-doelen:

1. **Uitleggen hoe het systeem technisch werkt**, op een begrijpelijke manier.  
2. **Voorbereiden van de uiteindelijke integratie** in het bestaande ICT-omgeving van Spectrumvisie.  
3. **Richtlijnen bieden aan de partij die het systeem technisch gaat overzetten**, zodat de overgang zonder problemen verloopt.

---

## 3. Overzicht van het Systeem
Het materiaalplatform bestaat uit de volgende onderdelen:

### 3.1 Front-end
- Een webinterface voor medewerkers en gebruikers.
- Mogelijkheid om materiaal te bekijken, downloaden of openen.
- Toegang afhankelijk van rolrechten.

### 3.2 Back-end (Laravel)
- API-gebaseerde architectuur.
- Materialen worden opgeslagen met categorieën, types en toegangsrechten.
- Rechtenstructuur:
  - **Bekijken** (can_view)
  - **Downloaden** (can_download)

### 3.3 Bestandenopslag
- Bestanden worden opgeslagen via **Laravel Storage**, gescheiden in een *priv                                                                                                                                                                                                     ate* disk.
- Alleen geautoriseerde gebruikers kunnen downloaden.

### 3.4 Gebruikers & Rollen
- Elke gebruiker heeft een rol (bijv. begeleider, admin).
- Rechten worden bepaald per rol per materiaal.

---

## 4. Integratiedoelen
1. Het platform beschikbaar maken in de ICT-omgeving van Spectrumvisie.  
2. Zorgen dat rechten en gebruikers correct worden gekoppeld.  
3. Upload- en downloadfunctionaliteit veilig en goed werkend configureren.  
4. Bestanden veilig migreren vanuit testomgeving naar productieomgeving.

---

## 5. Technische Randvoorwaarden

### 5.1 Serververeisten
- PHP 8.2 of hoger  
- Composer  
- MySQL database  
- Nginx of Apache webserver  


### 5.2 Systeemconfiguratie
- `.env` moet correct gevuld worden met:
  - Database inloggegevens  
  - Storage pad configuratie  
  - APP_KEY gegenereerd via `php artisan key:generate`

---

## 6. Datamigratie

### 6.1 Nodige gegevens om te migreren
- Gebruikers + rollen
- Categorieën
- Materialen
- Materialen-toegang (MaterialAccess)
- Bestaande bestanden

### 6.2 Migratieproces
1. Database exporteren vanuit testomgeving.  
2. Database importeren op productieomgeving.  
3. Bestanden kopiëren van `storage/app/private` naar productie.  
4. Controleren of alle relaties kloppen.

---

## 7. Integratie met Gebruikersomgeving

### 7.1 Inloggen
- Het platform kan standalone draaien of gekoppeld worden aan een bestaand accountsysteem.

### 7.2 Rollen & Rechten
Een beheerder kan via de database of een beheermodule instellen:
- Welke rol welke rechten heeft  
- Welke materialen zichtbaar zijn voor welke rol  

---

## 8. Test- en Acceptatieplan

### 8.1 Wat testen?
- Inloggen / uitloggen
- Materiaal bekijken (alle types)
- Downloads op basis van rechten
- Weergave voor ingelogde en niet-ingelogde gebruikers
- Uploadproces voor nieuwe materialen
- Veiligheid van bestanden (kunnen ze niet publiek benaderd worden?)

### 8.2 Testrollen
- Admin  
- Begeleider
- Ouder  
- Niet ingelogde gebruiker  

---

## 9. Overdrachtsdocumentatie
De persoon of partij die het systeem integreert ontvangt:

- Installatiehandleiding
- Project structuur & functie-overzicht
- Database-schema
- Uitleg van alle modellen en relaties
- Uitleg van rechten en categorieën
- Uitgebreide readme voor deployment

---

## 10. Conclusie
Dit integratieplan zorgt dat het materiaalplatform op een gestructureerde en veilige manier kan worden overgezet naar de omgeving van Spectrumvisie.

