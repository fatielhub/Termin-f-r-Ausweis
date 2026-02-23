# Rendez-vous CNI – Webprojekt

## Projektbeschreibung
Dieses Webprojekt dient zur Verwaltung von Terminen für Personalausweise (CNI) mit **Laravel** und **MySQL**.  
Das Projekt enthält Benutzer-Authentifizierung, Terminbuchung, CRUD-Funktionen und ein Dashboard für Administratoren.

## Technologien
- **Backend & Frontend:** Laravel 10 mit Blade Templates  
- **Datenbank:** MySQL  
- **API:** REST API, Laravel Sanctum für Authentifizierung

## Funktionen
1. **Benutzerverwaltung**
   - Registrierung und Login für Benutzer und Administratoren
   - Rollenbasierter Zugriff (User / Admin)

2. **Terminverwaltung**
   - Buchung von Terminen für Personalausweise
   - Administratoren können Termine verwalten (erstellen, bearbeiten, löschen)

3. **Dashboard (Admin)**
   - Übersicht über alle Termine und Benutzer
   - Statistiken für Verwaltung und Planung

4. **Authentifizierung & Sicherheit**
   - Laravel Sanctum für API-Sicherheit
   - Passwortschutz und Rollenverwaltung

## Installation
1. Repository klonen:
```bash
https://github.com/fatielhub/Termin-f-r-Ausweis.git
