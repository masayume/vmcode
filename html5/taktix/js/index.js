
var Card = (function Card(kanjilist) {
  var kanji;
  var $kanjifield;
  var $kanafield;
  var $translatefield;
  var $bimagefield;
  var $descrfield;
  var $wordsfield;
  var $card;
  
  
  function init() {
    $kanjifield = $("#kanji");
    $kanafield = $("#kana");
    $translatefield = $("#translation");
    $wordsfield = $("#words");
    $bimagefield = $("#bimage");
    $descrfield = $("#descr");
    $card = $("#card");
    kanji = kanjilist;
    bindUI();
    newCard();
  }
  
  
  function bindUI() {
    $card.on("click", handleClick);  
  }
  
  
  function newCard() {
    var newKanji = _.sample(kanji);
    $kanjifield.html(newKanji.name);
//    $kanafield.html(newKanji.kana);
    $translatefield.html(newKanji.english);
    $descrfield.html(newKanji.descr);
//    $wordsfield.html(newKanji.words3);
    var bimagefile = 'img/cards/' + newKanji.bimage + '.png';
    $bimagefield.attr('src', bimagefile);  
    if (newKanji.bimage == '000') {
      $bimagefield.css('width', 0);  
      $bimagefield.css('height', 0);  
    } else {
      $bimagefield.css('width', '90%');  
      $bimagefield.css('height', '90%');        
    }
  }
  
  
  function handleClick() {
    var tl = new TimelineMax();
    tl.to($card, .3, {
      rotationY: 90
    });
    tl.add(newCard);
    tl.to($card, .3, {
      rotationY: 0
    });
  }
  
  
  var api = {
    init: init,
  }
  return api;
})(KanjiArray);


window.addEventListener("load", Card.init);