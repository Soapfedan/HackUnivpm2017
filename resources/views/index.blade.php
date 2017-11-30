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
            <small>Vogliamo essere chiari con voi. Nulla di complicato, non troverete mai una clausola scritta piccola. Vi offriamo un servizio semplice e lineare. Nessuna cifra nascosta. Tutto sotto ai vostri occhi.</small>
          </div>
          <div class="slide">
            <h2 class="slide__title">#save</h2>
            <small>Risparmia. Risparmia tempo, non sottrarlo ai tuoi familiari, al tuo lavoro, alle tue passioni. Risparmia denaro, i nostri prezzi saranno sempre i più competitivi sul mercato. Risparmia inquinamento, ogni persona che condivide il proprio tempo per fare la spesa ad altri, fa risparmiare l’emissione di XX kg di CO2.</small>
          </div>
          <div class="slide">
            <h2 class="slide__title">#stopwaste</h2>
            <small>Hai molto tempo libero? Devi andare a fare spesa per casa tua? Usa una parte del tuo tempo per farlo anche per altri. Guadagna il prezzo del servizio. Fai risparmiare tempo a chi oggi non ne ha, domani potrebbe servire (a) te!</small>
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
        <h3 class="text-center display-4">Come funziona</h3>
        <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo arcu at finibus mollis. Morbi tempor orci sagittis quam rutrum sagittis. Vivamus sit amet molestie lectus. Aenean diam arcu, consectetur eu suscipit ultrices, posuere vitae nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent ac fringilla mauris, varius finibus ex.<br><br>

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