<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BotMan\BotMan\Storages\Storage;
//use BotMan\BotMan\Middleware\Dialogflow;

class Intents_Controller extends Controller
{
//###############################################################
//Intent: 6 - credit_Anzahl
  public function credit_Anzahl($bot){
    $extras = $bot->getMessage()->getExtras();
    $veranstaltung = $extras['apiParameters']['Veranstaltung'];
  //Prompts + Antworten
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
  $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
  $bot->reply('Die Veranstaltung ' . $veranstaltung . ' bringt 6 Credits');         //Dieser Fall wird aufgerufen, wenn die Veranstaltung in der Anfrage mit eingegeben wurde
  }
}
//###############################################################
//Intent: 6 - credit_Anzahl_withContext
public function credit_Anzahl_withContext($bot){
    $extras = $bot->getMessage()->getExtras();
    $veranstaltung = $extras['apiContext']['Veranstaltung'];
    //Prompts + Antworten
    if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
    }
    else {
    $bot->reply('Die Veranstaltung ' . $veranstaltung . ' bringt 6 Credits');         //Dieser Fall wird aufgerufen, wenn die Veranstaltung in der Anfrage mit eingegeben wurde
    }
  }
//###############################################################
//Intent: 4 - ort_Veranstaltung
public function ort_Veranstaltung($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung']; //Sucht nach Veranstaltung in Paramtern von Dialogflow und speichert sie in Variable
  $veranstaltungsart = $extras['apiParameters']['Veranstaltungsart'];
  //Prompts
  //Hier wird geprüft, ob alle nötigen Informationen vorhanden sind und ob sie aus dem Context aufgegriffen werden können
  if(strlen($veranstaltung) ===  0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  elseif(strlen($veranstaltungsart) ===  0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Möchten Sie diese Information zur Vorlesung, Übung oder dem Tutorium?');
  }
  else{
    $bot->reply($veranstaltung.' '.'('.$veranstaltungsart.') ist im Raum ZHG 103.');  //Platzhalter für Raum abfragen, der aus DB geholt wird
  }
}
//###############################################################
//Intent: 4 - ort_Veranstaltung_withContext
public function ort_Veranstaltung_withContext($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiContext']['Veranstaltung']; //Sucht nach Veranstaltung in Paramtern von Dialogflow und speichert sie in Variable
  $veranstaltungsart = $extras['apiContext']['Veranstaltungsart'];
//Prompts
  if(strlen($veranstaltung) === 0){
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  elseif(strlen($veranstaltungsart) === 0){
    $bot->reply('Möchten Sie diese Information zur Vorlesung, Übung oder dem Tutorium?');
  }
//Antworten auf Frage
  else{
    $bot->reply($veranstaltung.' '.'('.$veranstaltungsart.') ist im Raum ZHG 103.');
  }
}
//###############################################################
//Intent: 3 - veranstaltung_Termin
public function termin_Veranstaltung($bot){
  //Aufruf der Extras der Dialogflow Middleware. Hier auf Elemente des JSONs von Dialogflow zugegriffen werden
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung']; //Sucht nach Veranstaltung in Paramtern von Dialogflow und speichert sie in Variable
  $veranstaltungsart = $extras['apiParameters']['Veranstaltungsart'];
//Prompts
//Hier wird geprüft, ob alle nötigen Informationen vorhanden sind und ob sie aus dem Context aufgegriffen werden können
if(strlen($veranstaltung) ===  0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
  $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
}
elseif(strlen($veranstaltungsart) ===  0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
  $bot->reply('Möchten Sie diese Information zur Vorlesung, Übung oder dem Tutorium?');
}
else{
//Antowort
      $bot->reply($veranstaltung . ' ' . '(' . $veranstaltungsart . ') findet am Dienstag von 12:15 bis 13:45 statt');  //Platzhalter für Raum abfragen, der aus DB geholt wird
}
}
//###############################################################
//Intent: 3 - veranstaltung_Termin_withContext
public function termin_Veranstaltung_withContext($bot){
  //Aufruf der Extras der Dialogflow Middleware. Hier auf Elemente des JSONs von Dialogflow zugegriffen werden
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiContext']['Veranstaltung']; //Sucht nach Veranstaltung in Paramtern von Dialogflow und speichert sie in Variable
  $veranstaltungsart = $extras['apiContext']['Veranstaltungsart'];
//Prompts
//Hier wird geprüft, ob alle nötigen Informationen vorhanden sind und ob sie aus dem Context aufgegriffen werden können
if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
  $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
}
elseif(strlen($veranstaltungsart) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
  $bot->reply('Möchten Sie diese Information zur Vorlesung, Übung oder dem Tutorium?');
}
else{
//Antowort
      $bot->reply($veranstaltung.' '.'('.$veranstaltungsart.') findet am Dienstag von 12:15 bis 13:45 statt');  //Platzhalter für Raum abfragen, der aus DB geholt wird
}
}
//###############################################################
// Intent: 5 - termin_Klausur
public function termin_Klausur($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung'];

  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
$bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
}
else {
$bot->reply('Die Klausur in ' . $veranstaltung . ' ist am 13.08.2018'); //Dieser Fall wird aufgerufen, wenn die Veranstaltung aus dem Context geholt wird
}
}
//###############################################################
// Intent: 5 - termin_Klausur_withContext
public function termin_Klausur_withContext($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiContext']['Veranstaltung'];

  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
$bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
}
else {
$bot->reply('Die Klausur in ' . $veranstaltung . ' ist am 13.08.2018'); //Dieser Fall wird aufgerufen, wenn die Veranstaltung aus dem Context geholt wird
}
}
//###############################################################
//Intent: 9 - beschreibung_Veranstaltung
public function beschreibung_Veranstaltung($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung'];
//Prompts + Antworten
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Die Veranstaltung Management der Informationssysteme beschäftigt sich mit der produktorientierten Gestaltung der betrieblichen Informationsverarbeitung. Unter Produkt wird hier das Anwendungssystem bzw. eine ganze Landschaft aus Anwendungssystemen verstanden, die es zu gestalten und organisieren gilt. Der Fokus der Veranstaltung liegt auf der Vermittlung von vorgehensweisen sowie Methoden und konkreten Instrumenten, welche es erlauben, Anwendungssysteme logisch-konzeptionell zu gestalten.');
    }
  }
//###############################################################
//Intent: 9 - beschreibung_Veranstaltung_withContext
public function beschreibung_Veranstaltung_withContext($bot){
    $extras = $bot->getMessage()->getExtras();
    $veranstaltung = $extras['apiContext']['Veranstaltung'];
  //Prompts + Antworten
    if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
      $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
    }
    else {
      $bot->reply('Die Veranstaltung Management der Informationssysteme beschäftigt sich mit der produktorientierten Gestaltung der betrieblichen Informationsverarbeitung. Unter Produkt wird hier das Anwendungssystem bzw. eine ganze Landschaft aus Anwendungssystemen verstanden, die es zu gestalten und organisieren gilt. Der Fokus der Veranstaltung liegt auf der Vermittlung von vorgehensweisen sowie Methoden und konkreten Instrumenten, welche es erlauben, Anwendungssysteme logisch-konzeptionell zu gestalten.');
      }
    }
//###############################################################
//Intent: 2 - mitarbeiter_Kontakt
public function mitarbeiter_Kontakt($bot){
  $extras = $bot->getMessage()->getExtras();
  $mitarbeiter = $extras['apiParameters']['Mitarbeiter'];
  $kontaktart = $extras['apiParameters']['Kontaktart'];
  //Prompts
  if(strlen($mitarbeiter) === 0) {       //Dieser Fall wird aufgerufen, wenn kein Mitarbeiter eingegeben wurde
  $bot->reply('Welchen Mitarbeiter möchten Sie kontaktieren?');
  }
  elseif (strlen($kontaktart) === 0) {    //Nachfrage Kontaktart falls diese nicht eingegeben wurde
  $bot->reply('Wie möchten Sie ' . $mitarbeiter . ' kontaktieren?');
  }
  else {
  $bot->reply('Die ' . $kontaktart . ' von ' . $mitarbeiter . ' lautet: Tel. ...');
  }

  }
//###############################################################
//Intent: 13 - ansprechpartner_Veranstaltung
public function ansprechpartner_Veranstaltung($bot){
$extras = $bot->getMessage()->getExtras();
$veranstaltung = $extras['apiParameters']['Veranstaltung'];
//Prompts
if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
$bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
}
else {
$bot->reply('Ansprechpartner für ' . $veranstaltung . ' ist Pascal Freier');
}

}

//###############################################################
//Intent: 13 - ansprechpartner_Veranstaltung_withContext
public function ansprechpartner_Veranstaltung_withContext($bot){
$extras = $bot->getMessage()->getExtras();
$veranstaltung = $extras['apiContext']['Veranstaltung'];
//Prompts
if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
$bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
}
else {
$bot->reply('Ansprechpartner für ' . $veranstaltung . ' ist Pascal Freier');
}
}
//###############################################################
//Intent: 10 - Anmelderegeln
public function anmeldehilfe_Veranstaltung($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung'];
//Prompts + Antworten
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Anmelderegeln');
  }
}
//###############################################################
//Intent: 10 - anmeldehilfe_Veranstaltung_withContext
public function anmeldehilfe_Veranstaltung_withContext($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiContext']['Veranstaltung'];
//Prompts + Antworten
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Anmelderegeln mit Context');
  }
}
//###############################################################
//Intent: 11 - vorkenntnisse_Veranstaltung
public function vorkenntnisse_Veranstaltung($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung'];
//Prompts
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Vorkenntnisse');
  }
}
//###############################################################
//Intent: 11 - vorkenntnisse_Veranstaltung_withContext
public function vorkenntnisse_Veranstaltung_withContext($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiContext']['Veranstaltung'];
//Prompts
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Vorkenntnisse mit Context');
  }
}
//###############################################################
//Intent: 8 - vorleistung_Klausur
public function vorleistung_Klausur($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiParameters']['Veranstaltung'];
//Prompts
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Vorleistung zur Klausur in ' . $veranstaltung . ': Die Übung stellt eine Vorleistung zur Klausur dar. Während des Semesters müssen drei Aufgaben zu den Inhalten Vorlesung bearbeitet werden. Alle Aufgaben müssen bestanden sein, um an der Klausur am Ende des Semesters teilzunehmen.');
  }
}
//###############################################################
//Intent: 8 - vorleistung_Klausur_withContext
public function vorleistung_Klausur_withContext($bot){
  $extras = $bot->getMessage()->getExtras();
  $veranstaltung = $extras['apiContext']['Veranstaltung'];
//Prompts
  if(strlen($veranstaltung) === 0) {       //Dieser Fall wird aufgerufen, wenn die Veranstaltung nicht eingegeben wurde
    $bot->reply('Für welche Veranstaltung möchten Sie diese Information?');
  }
  else {
    $bot->reply('Vorleistung zur Klausur in ' . $veranstaltung . ': Die Übung stellt eine Vorleistung zur Klausur dar. Während des Semesters müssen drei Aufgaben zu den Inhalten Vorlesung bearbeitet werden. Alle Aufgaben müssen bestanden sein, um an der Klausur am Ende des Semesters teilzunehmen.');
  }
}
//###############################################################

}