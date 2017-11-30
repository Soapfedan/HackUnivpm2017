@extends('layouts.master')
@section('content')
  
   <main>
      <div class="slideshow">
        <div class="slides slides--images">
          <div class="slide slide--current">
            <div class="slide__img" style="background-image: url(img/easy.jpg)"></div>
          </div>
          <div class="slide">
            <div class="slide__img" style="background-image: url(img/save.jpg)"></div>
          </div>
          <div class="slide">
            <div class="slide__img" style="background-image: url(img/no_waste.png)"></div>
          </div>
        </div>
        <div class="slides slides--titles">
          <div class="slide slide--current">
            <h2 class="slide__title">#easy<br></h2>
            <small>Vi offriamo un servizio semplice e lineare.
            Nessuna cifra nascosta. Tutto sotto ai vostri occhi.
            </small>
          </div>
          <div class="slide">
            <h2 class="slide__title">#save</h2>
            <small>Risparmia tempo, non sottrarlo ai tuoi familiari, al tuo lavoro, alle tue passioni.<br>
          Risparmia denaro, i nostri prezzi saranno sempre i più competitivi sul mercato.<br>
          Risparmia inquinamento, ogni persona che condivide la propria spesa evita l’emissione di CO2.
          </small>
          </div>
          <div class="slide">
            <h2 class="slide__title">#stopwaste</h2>
            <small>Non sprecare tempo, usane una parte per fare spesa anche per altri.<br>
          Guadagnerai due volte. 
          Fai risparmiare tempo a chi oggi non ne ha, domani potrebbe servire (a) te!
          </small>
          </div>
        </div>
        <nav class="slidenav">
          <button class="slidenav__item slidenav__item--prev">&nbsp;</button>
          <span>&nbsp;</span>
          <button class="slidenav__item slidenav__item--next">&nbsp;</button>
        </nav>
      </div>
    </main>

    <div class="container">
      
      <!-- COME FUNZIONA -->
      <section class="py-5">
        <h3 class="text-center display-4">Come funziona?</h3>
        <p class="lead text-center">
          Devi fare spesa?
          Posta la tua lista della spesa, e aspetta solamente che qualcuno la prenda in carico.
          <br>&#8595;<br>
          Accetta lo Shopper
          Vedi chi vuole fare la tua spesa. Guarda le sue recensioni, scegli se affidargli l’incarico o aspettare il prossimo, e se ti va poi valutalo. La Tua spesa per noi è importante, vogliamo che lo sia anche per chi se ne occuperà.
          <br>&#8595;<br>
          Aspetta.
          Non ti resta che aspettare che la spesa arrivi all’orario concordato. Sarei libero di fare ciò che dovevi, senza alcuna preoccupazione.
        <br><br>

        <a href="#" class="btn btn-primary btn-lg">Scopri di più &#8594;</a></p>
      </section>

      <section class="py-5">
        <h3 class="text-center display-4">Perché LetMeBuy.It?</h3>
        <p class="lead text-center">
        La vera domanda è: perché no?!
        Ce lo siamo chiesti più volte prima di buttarci in questa avventura.
        Ore interminabili di attesa alle casse, perdite di tempo, una vita di corsa, tutto questo per comprare magari 3 prodotti.

        Ma perché farlo se qualcuno può e vuole farlo per Voi?

        Let Me Buy It si propone di diventare la prima e più grande community al mondo di condivisione della spesa domestica: la piattaforma mette in contatto persone impossibilitate a sopperire ad un bisogno primario come quello della spesa domestica con chi invece sarebbe andato oggi stesso a far spesa per sé.

        <br><br>

        <a href="#" class="btn btn-primary btn-lg">Scopri di più &#8594;</a></p>
      </section>

    </div>

    <!-- I NOSTRI NUMERI -->
    <section class="py-5 numbers">
        <div class="container">
          <div class="row">

            <div class="col-md-4 my-2">
              <div class="card border-primary values">
                <div class="card-body">
                  <img src="img/user.png"><br><br>
                  <h2>302</h2>
                  <h4>Utenti iscritti</h4>
                </div>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <div class="card border-primary values">
                <div class="card-body">
                  <img src="img/user.png"><br><br>
                  <h2>103.212</h2>
                  <h4>Spese completate</h4>
                </div>
              </div>
            </div>

            <div class="col-md-4 my-2">
              <div class="card border-primary values">
                <div class="card-body">
                  <img src="img/user.png"><br><br>
                  <h2>150Kg</h2>
                  <h4>CO2 risparmiata</h4>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
 <script src="js/slideshow.js"></script>
@endsection