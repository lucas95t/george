function feedbackTimer(){
  var inaktZeit = 0;
  var angezeigt = false;
  $(document).ready(function () {

  //Erhöhe den Inaktivitätszähler jede Sekunde
  var inaktInterval = setInterval(timerErhoehen, 1000); // 1000ms=1Sek

  //Bei Mausbewegung oder Tastatureingabe wird Timer auf 0 gesetzt
  $(this).mousemove(function (e) {
      inaktZeit = 0;
  });
  $(this).keypress(function (e) {
      inaktZeit = 0;
  });
});

//Timererhöhung und Ausgabe der Feedbackfrage
function timerErhoehen() {
    inaktZeit = inaktZeit + 1;
    if (inaktZeit == 60 && angezeigt == false) { //60 Sekunden und noch nicht angezeigt worden
        botmanChatWidget.whisper("bananenkanu");
        angezeigt = true;
    }
  }
}
