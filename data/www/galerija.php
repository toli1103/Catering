<?php
$pageTitle = "Galerija | Okus po domu";
$activePage = "galerija";
require_once __DIR__ . "/includes/header.php";
?>

<main>

    <!-- NASLOV STRANI -->
    <section class="intro-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <span class="section-label">GALERIJA</span>
            <h1>Utrinki naših pogostitev</h1>
            <p>
              Oglejte si nekaj trenutkov z dogodkov, praznovanj in catering postavitev,
              kjer smo ustvarjali domače okuse, elegantno prezentacijo in prijetno vzdušje.
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- PREDSTAVITEV GALERIJE -->
    <section class="services-section">
      <div class="container">

        <div class="row align-items-center g-4">

          <div class="col-lg-4">
            <div class="service-card h-100 text-center">
              <i class="bi bi-images"></i>
              <h3>Pristni trenutki</h3>
              <p>
                Vsaka pogostitev je zasnovana z občutkom za estetiko,
                domačnost in doživetje gostov.
              </p>
            </div>
          </div>

          <div class="col-lg-8">
            <span class="section-label">DOGODKI IN POSTREŽBA</span>
            <h2 class="section-title text-start">Od elegantnih sprejemov do domačih praznovanj</h2>
            <p class="order-text">
              V galeriji so predstavljeni različni tipi catering postavitev,
              sladkih kotičkov, finger food ponudbe in dekoracije.
              Naš cilj je ustvariti popolno kombinacijo okusov,
              vizualne podobe in prijetnega vzdušja za vsak dogodek.
            </p>
          </div>

        </div>

      </div>
    </section>


    <!-- GALERIJA SLIK -->
    <section class="gallery-section py-5">
      <div class="container">

        <div class="row text-center mb-5">
          <div class="col">
            <span class="section-label">GALERIJA</span>
            <h2 class="section-title">Utrinki z dogodkov</h2>
            <p class="order-text">
              Nekaj utrinkov pogostitev, sladkih kotičkov in postrežbe podjetja Okus po domu.
            </p>
          </div>
        </div>

        <div class="row g-4">

          <div class="col-sm-6 col-lg-4">
            <div class="gallery-card">
              <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=1200&auto=format&fit=crop" 
                   alt="Catering miza" class="img-fluid rounded-4 shadow-sm gallery-img">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="gallery-card">
              <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=1200&auto=format&fit=crop" 
                   alt="Dogodek s pogostitvijo" class="img-fluid rounded-4 shadow-sm gallery-img">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="gallery-card">
              <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=1200&auto=format&fit=crop" 
                   alt="Hrana in dekoracija" class="img-fluid rounded-4 shadow-sm gallery-img">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="gallery-card">
              <img src="https://images.unsplash.com/photo-1466978913421-dad2ebd01d17?q=80&w=1200&auto=format&fit=crop" 
                   alt="Finger food ponudba" class="img-fluid rounded-4 shadow-sm gallery-img">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="gallery-card">
              <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop" 
                   alt="Pripravljena jed" class="img-fluid rounded-4 shadow-sm gallery-img">
            </div>
          </div>

          <div class="col-sm-6 col-lg-4">
            <div class="gallery-card">
              <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop" 
                   alt="Pogostitev na dogodku" class="img-fluid rounded-4 shadow-sm gallery-img">
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- CTA -->
    <section class="order-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <span class="section-label">TUDI VI NAČRTUJETE DOGODEK?</span>
            <h2 class="section-title">Pošljite povpraševanje</h2>
            <p class="order-text">
              Izberite vrsto dogodka, število gostov in dodatne želje. Pripravili vam
              bomo ponudbo, ki bo prilagojena vašemu dogodku.
            </p>
            <a href="narocila.php" class="btn btn-main">Oddaj povpraševanje</a>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php require_once __DIR__ . "/includes/footer.php"; ?>
