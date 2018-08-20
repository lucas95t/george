<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\Dialogflow;         //Import Dialogflow Middleware API
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Attachments\OutgoingMessage;
use BotMan\BotMan\Storages\Storage;             // Import zum speichern von Nutzereingaben
//Buttons
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;
//Import Controller
use App\Http\Controllers\Intents_Controller;



$botman = resolve('botman');

// Dialogflow integration

$dialogflow = Dialogflow::create('e7f8be73aec445398718216e861df354')->listenForAction(); //Client access token Dialogflow eingefügt

$botman->middleware->received($dialogflow); //Jede Nachricht die ankommt wird an die Middleware geschickt

//################################################################################################################################################
//Intent: Default Fallback Intent
$botman->hears('input.unknown', function ($bot) {
  $bot->startConversation(new App\Http\Conversations\Fallback);
})->middleware($dialogflow);

//################################################################################################################################################
//Intent: 00 - feedback_Intent
$botman->hears('say_feedback_Intent', function ($bot) {
  $bot->startConversation(new App\Http\Conversations\Feedback);
})->middleware($dialogflow);

//################################################################################################################################################
//Intent: 1 - sprechzeit_Mitarbeiter
  $botman->hears('say_sprechzeit_Mitarbeiter', 'App\Http\Controllers\Intents_Controller@sprechzeit_Mitarbeiter')->middleware($dialogflow);

//################################################################################################################################################
//Intent: 1 - sprechzeit_Mitarbeiter_withContext
  $botman->hears('say_sprechzeit_Mitarbeiter_withContext', 'App\Http\Controllers\Intents_Controller@sprechzeit_Mitarbeiter_withContext')->middleware($dialogflow);

//################################################################################################################################################
//Intent: 2 - kontakt_Mitarbeiter
    $botman->hears('say_mitarbeiter_Kontakt', 'App\Http\Controllers\Intents_Controller@mitarbeiter_Kontakt') ->middleware($dialogflow);
    $botman->hears('say_mitarbeiter_Kontakt_withContext', 'App\Http\Controllers\Intents_Controller@mitarbeiter_Kontakt_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 3 - termin_Veranstaltung
  $botman->hears('say_termin_Veranstaltung', 'App\Http\Controllers\Intents_Controller@termin_Veranstaltung')->middleware($dialogflow);

//################################################################################################################################################
//Intent: 3 - termin_Veranstaltung_withContext
  $botman->hears('say_termin_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@termin_Veranstaltung_withContext')->middleware($dialogflow);

  //################################################################################################################################################
  //Intent: 4 - studienplan_WiInf
    $botman->hears('say_studienplan_WiInf', 'App\Http\Controllers\Intents_Controller@studienplan_WiInf')->middleware($dialogflow);

//################################################################################################################################################
//Intent: 5 - termin_Klausur
  $botman->hears('say_termin_Klausur', 'App\Http\Controllers\Intents_Controller@termin_Klausur') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 5 - termin_Klausur_withContext
  $botman->hears('say_termin_Klausur_withContext', 'App\Http\Controllers\Intents_Controller@termin_Klausur_withContext') ->middleware($dialogflow); //

//################################################################################################################################################
//Intent: 6 - credit_Anzahl
  $botman->hears('say_credit_Anzahl', 'App\Http\Controllers\Intents_Controller@credit_Anzahl') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 6 - credit_Anzahl_withContext
  $botman->hears('say_credit_Anzahl_withContext', 'App\Http\Controllers\Intents_Controller@credit_Anzahl_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 8 - vorleistung_Klausur
  $botman->hears('say_vorleistung_Klausur', 'App\Http\Controllers\Intents_Controller@vorleistung_Klausur') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 8 - vorleistung_Klausur_withContext
  $botman->hears('say_vorleistung_Klausur_withContext', 'App\Http\Controllers\Intents_Controller@vorleistung_Klausur_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 9 - beschreibung_Veranstaltung
  $botman->hears('say_beschreibung_Veranstaltung', 'App\Http\Controllers\Intents_Controller@beschreibung_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 9 - beschreibung_Veranstaltung_withContext
  $botman->hears('say_beschreibung_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@beschreibung_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 10 - anmeldehilfe_Veranstaltung
  $botman->hears('say_anmeldehilfe_Veranstaltung', 'App\Http\Controllers\Intents_Controller@anmeldehilfe_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 10 - anmeldehilfe_Veranstaltung_withContext
  $botman->hears('say_anmeldehilfe_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@anmeldehilfe_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 11 - vorkenntnisse_Veranstaltung
  $botman->hears('say_vorkenntnisse_Veranstaltung', 'App\Http\Controllers\Intents_Controller@vorkenntnisse_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 11 - vorkenntnisse_Veranstaltung_withContext
  $botman->hears('say_vorkenntnisse_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@vorkenntnisse_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 13 - ansprechpartner_Veranstaltung
  $botman->hears('say_ansprechpartner_Veranstaltung', 'App\Http\Controllers\Intents_Controller@ansprechpartner_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 13 - ansprechpartner_Veranstaltung_withContext
  $botman->hears('say_ansprechpartner_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@ansprechpartner_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 14 - turnus_Veranstaltung
  $botman->hears('say_turnus_Veranstaltung', 'App\Http\Controllers\Intents_Controller@turnus_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 14 - turnus_Veranstaltung_withContext
  $botman->hears('say_turnus_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@turnus_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 15 - literatur_Veranstaltung
  $botman->hears('say_literatur_Veranstaltung', 'App\Http\Controllers\Intents_Controller@literatur_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 15 - literatur_Veranstaltung_withContext
  $botman->hears('say_literatur_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@literatur_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 16 - klausur_Anmeldung
  $botman->hears('say_klausur_Anmeldung', 'App\Http\Controllers\Intents_Controller@klausur_Anmeldung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 16 - klausur_Anmeldung_withContext
  $botman->hears('say_klausur_Anmeldung_withContext', 'App\Http\Controllers\Intents_Controller@klausur_Anmeldung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 17 - gesamtueberblick_Veranstaltung
  $botman->hears('say_gesamtueberblick_Veranstaltung', 'App\Http\Controllers\Intents_Controller@gesamtueberblick_Veranstaltung') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 17 - gesamtueberblick_Veranstaltung_withContext
  $botman->hears('say_gesamtueberblick_Veranstaltung_withContext', 'App\Http\Controllers\Intents_Controller@gesamtueberblick_Veranstaltung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 18 - veranstaltungen_Mitarbeiter
  $botman->hears('say_veranstaltungen_Mitarbeiter', 'App\Http\Controllers\Intents_Controller@veranstaltungen_Mitarbeiter') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 18 - veranstaltungen_Mitarbeiter_withContext
  $botman->hears('say_veranstaltungen_Mitarbeiter_withContext', 'App\Http\Controllers\Intents_Controller@veranstaltungen_Mitarbeiter_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 19 - abschlussarbeiten_Mitarbeiter
  $botman->hears('say_abschlussarbeiten_Mitarbeiter', 'App\Http\Controllers\Intents_Controller@abschlussarbeiten_Mitarbeiter') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 19 - abschlussarbeiten_Mitarbeiter_withContext
  $botman->hears('say_abschlussarbeiten_Mitarbeiter_withContext', 'App\Http\Controllers\Intents_Controller@abschlussarbeiten_Mitarbeiter_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 20 - projekte_Lehrstuhl
  $botman->hears('say_projekte_Lehrstuhl', 'App\Http\Controllers\Intents_Controller@projekte_Lehrstuhl') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 21 - foto_Mitarbeiter
  $botman->hears('say_foto_Mitarbeiter', 'App\Http\Controllers\Intents_Controller@foto_Mitarbeiter') ->middleware($dialogflow);
  $botman->hears('say_foto_Mitarbeiter_withContext', 'App\Http\Controllers\Intents_Controller@foto_Mitarbeiter_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 7 - naechster_Termin_Seminar
  $botman->hears('say_naechster_Termin_Seminar', 'App\Http\Controllers\Intents_Controller@naechster_Termin_Seminar') ->middleware($dialogflow);
  $botman->hears('say_naechster_Termin_Seminar_withContext', 'App\Http\Controllers\Intents_Controller@naechster_Termin_Seminar_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 22 - termin_Seminar
  $botman->hears('say_termin_Seminar', 'App\Http\Controllers\Intents_Controller@termin_Seminar') ->middleware($dialogflow);
  $botman->hears('say_termin_Seminar_withContext', 'App\Http\Controllers\Intents_Controller@termin_Seminar_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 23 - ort_Seminar
  $botman->hears('say_ort_Seminar', 'App\Http\Controllers\Intents_Controller@ort_Seminar') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 23 - ort_Seminar_withContext
  $botman->hears('say_ort_Seminar_withContext', 'App\Http\Controllers\Intents_Controller@ort_Seminar_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 24 - themen_Seminar
  $botman->hears('say_themen_Seminar', 'App\Http\Controllers\Intents_Controller@themen_Seminar') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 25 - themen_Seminar_nachMitarbeiter
  $botman->hears('say_themen_Seminar_nachMitarbeiter', 'App\Http\Controllers\Intents_Controller@themen_Seminar_nachMitarbeiter') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 25 - themen_Seminar_nachMitarbeiter_withContext
  $botman->hears('say_themen_Seminar_nachMitarbeiter_withContext', 'App\Http\Controllers\Intents_Controller@themen_Seminar_nachMitarbeiter_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 26 - terminuebersicht_Seminar
  $botman->hears('say_terminuebersicht_Seminar', 'App\Http\Controllers\Intents_Controller@terminuebersicht_Seminar') ->middleware($dialogflow);
  $botman->hears('say_terminuebersicht_Seminar_withContext', 'App\Http\Controllers\Intents_Controller@terminuebersicht_Seminar_withContext') ->middleware($dialogflow);
//################################################################################################################################################
//Projekte
//################################################################################################################################################
//Intent: 27 - beschreibung_Projekt
  $botman->hears('say_beschreibung_Projekt', 'App\Http\Controllers\Intents_Controller@beschreibung_Projekt') ->middleware($dialogflow);
  $botman->hears('say_beschreibung_Projekt_withContext', 'App\Http\Controllers\Intents_Controller@beschreibung_Projekt_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 28 - kontaktperson_Projekt
  $botman->hears('say_kontaktperson_Projekt', 'App\Http\Controllers\Intents_Controller@kontaktperson_Projekt') ->middleware($dialogflow);
  $botman->hears('say_kontaktperson_Projekt_withContext', 'App\Http\Controllers\Intents_Controller@kontaktperson_Projekt_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 29 - bueroraum
  $botman->hears('say_bueroraum', 'App\Http\Controllers\Intents_Controller@bueroraum') ->middleware($dialogflow);
  $botman->hears('say_bueroraum_withContext', 'App\Http\Controllers\Intents_Controller@bueroraum_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent:30 -naechster_Termin_Veranstaltung
//################################################################################################################################################
$botman->hears('say_naechster_Termin_Veranstaltung','App\Http\Controllers\Intents_Controller@naechster_Termin_Veranstaltung')->middleware($dialogflow);
//################################################################################################################################################
//Intent:30 -naechster_Termin_Veranstaltung_withContext
//################################################################################################################################################
$botman->hears('say_naechster_Termin_Veranstaltung_withContext','App\Http\Controllers\Intents_Controller@naechster_Termin_Veranstaltung_withContext')->middleware($dialogflow);

//################################################################################################################################################
//Intent:31 -stellenangebote_Lehrstuhl
//################################################################################################################################################
$botman->hears('say_lehrstuhl_Stellenangebote', 'App\Http\Controllers\Intents_Controller@stellenangebote_Lehrstuhl') ->middleware($dialogflow);
//################################################################################################################################################
//Intent: 32 - stellenangebot_Beschreibung
  $botman->hears('say_stellenangebot_Beschreibung', 'App\Http\Controllers\Intents_Controller@stellenangebot_Beschreibung') ->middleware($dialogflow);
  $botman->hears('say_stellenangebot_Beschreibung_withContext', 'App\Http\Controllers\Intents_Controller@stellenangebot_Beschreibung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 33 - stellenangebot_Beschreibung
  $botman->hears('say_aufgaben_Stelle', 'App\Http\Controllers\Intents_Controller@aufgaben_Stelle') ->middleware($dialogflow);
  $botman->hears('say_aufgaben_Stelle_withContext', 'App\Http\Controllers\Intents_Controller@aufgaben_Stelle_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 34 - bewerbungsinformationen_Stelle
  $botman->hears('say_bewerbungsinformationen_Stelle', 'App\Http\Controllers\Intents_Controller@bewerbungsinformationen_Stelle') ->middleware($dialogflow);
  $botman->hears('say_bewerbungsinformationen_Stelle_withContext', 'App\Http\Controllers\Intents_Controller@bewerbungsinformationen_Stelle_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 35 - Pflichtberatung
  $botman->hears('say_pflichtberatung', 'App\Http\Controllers\Intents_Controller@pflichtberatung') ->middleware($dialogflow);
  $botman->hears('say_pflichtberatung_withContext', 'App\Http\Controllers\Intents_Controller@pflichtberatung_withContext') ->middleware($dialogflow);

//################################################################################################################################################
//Intent: 36 - liste_Veranstaltungen
    $botman->hears('say_liste_Veranstaltungen', 'App\Http\Controllers\Intents_Controller@liste_Veranstaltungen') ->middleware($dialogflow);
//################################################################################################################################################
//Smalltalk
//################################################################################################################################################
//Intent: 37 - funktionsweise_George
  $botman->hears('say_funktionsweise_George', 'App\Http\Controllers\Intents_Controller@funktionsweise_George') ->middleware($dialogflow);
//smalltalk_Danke
//################################################################################################################################################
$botman->hears('say_smalltalk_Danke', 'App\Http\Controllers\Intents_Controller@smalltalk_Danke') ->middleware($dialogflow);
//Informationen_Chatbot
//################################################################################################################################################
$botman->hears('say_smalltalk_Info_Chatbot', 'App\Http\Controllers\Intents_Controller@smalltalk_Info_Chatbot') ->middleware($dialogflow);
//smalltalk_Herkunft
//################################################################################################################################################
$botman->hears('say_smalltalk_Herkunft', 'App\Http\Controllers\Intents_Controller@smalltalk_Herkunft') ->middleware($dialogflow);
//smalltalk_Chatbot
//################################################################################################################################################
$botman->hears('say_smalltalk_Chatbot', 'App\Http\Controllers\Intents_Controller@smalltalk_Chatbot') ->middleware($dialogflow);
//smalltalk_kannst_du_helfen
//################################################################################################################################################
$botman->hears('say_smalltalk_kannst_du_helfen', 'App\Http\Controllers\Intents_Controller@smalltalk_kannst_du_helfen') ->middleware($dialogflow);
//smalltalk_beschaeftigt
//################################################################################################################################################
$botman->hears('say_smalltalk_beschaeftigt', 'App\Http\Controllers\Intents_Controller@smalltalk_beschaeftigt') ->middleware($dialogflow);
//smalltalk_langweilig
//################################################################################################################################################
$botman->hears('say_smalltalk_langweilig', 'App\Http\Controllers\Intents_Controller@smalltalk_langweilig') ->middleware($dialogflow);
//smalltalk_Willkommen
//################################################################################################################################################
$botman->hears('say_smalltalk_Willkommen', 'App\Http\Controllers\Intents_Controller@smalltalk_Willkommen') ->middleware($dialogflow);
