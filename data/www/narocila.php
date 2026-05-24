<?php
session_start();
$pageTitle = 'Naročila | Okus po domu';
$activePage = 'narocila';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/header.php';
$formStatus = $_SESSION['form_status'] ?? null;
unset($_SESSION['form_status']);
?>

<main>
    <!-- UVOD -->
    <section class="intro-section">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <span class="section-label">NAROČILA IN REZERVACIJE</span>
            <h1>Načrtujmo vaš popoln dogodek</h1>
            <p>
              Pošljite povpraševanje za catering, praznovanje ali poslovni dogodek.
              Skupaj bomo ustvarili ponudbo, prilagojeno vašim željam,
              številu gostov in tipu dogodka.
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- NAROČILA -->
    <section class="order-section" id="narocila">
      <div class="container">

        <div class="row g-5 align-items-stretch">

          <div class="col-lg-5">
            <div class="contact-card h-100">

              <div class="contact-image mb-4">
                <img
                  src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=1200&auto=format&fit=crop"
                  alt="Catering postavitev"
                  class="img-fluid rounded-4 shadow-sm"
                >
              </div>

              <span class="section-label">KONTAKT</span>
              <h2 class="section-title text-start">Stopite v stik z nami</h2>

              <p class="order-text">
                Vsako povpraševanje obravnavamo individualno.
                Pomagamo vam pri izbiri hrane, dekoracije,
                postavitve in organizacije pogostitve.
              </p>

              <div class="contact-box modern-contact mt-4">
                <p><i class="bi bi-envelope-heart"></i> okus.podomu@email.com</p>
                <p><i class="bi bi-telephone"></i> 031 000 000</p>
                <p><i class="bi bi-geo-alt"></i> Slovenija</p>
                <p><i class="bi bi-clock"></i> Po dogovoru </p>
              </div>

            </div>
          </div>

          <div class="col-lg-7">
            <div class="form-wrapper">
              <?php if ($formStatus): ?>
                <div class="alert <?= htmlspecialchars($formStatus['class'], ENT_QUOTES, 'UTF-8') ?> mb-4" role="alert">
                  <?= htmlspecialchars($formStatus['message'], ENT_QUOTES, 'UTF-8') ?>
                </div>
              <?php endif; ?>

              <form class="order-form modern-form" action="submit_order.php" method="post" novalidate>
                <div class="row g-4">

                  <div class="col-md-6">
                    <label for="ime" class="form-label">Ime in priimek</label>
                    <input type="text" class="form-control" id="ime" name="ime_priimek" placeholder="Vaše ime in priimek" required>
                  </div>

                  <div class="col-md-6">
                    <label for="email" class="form-label">E-pošta</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="vas@email.com" required>
                  </div>

                  <div class="col-md-6">
                    <label for="telefon" class="form-label">Telefonska številka</label>
                    <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="031 000 000" required>
                  </div>

                  <div class="col-md-6">
                    <label for="datum" class="form-label">Datum dogodka</label>
                    <input type="date" class="form-control" id="datum" name="datum_dogodka" required>
                  </div>

                  <div class="col-md-6">
                    <label for="dogodek" class="form-label">Vrsta dogodka</label>
                    <select class="form-select" id="dogodek" name="vrsta_dogodka" required>
                      <option value="" selected disabled>Izberite...</option>
                      <option>Poroka</option>
                      <option>Rojstni dan</option>
                      <option>Poslovni dogodek</option>
                      <option>Zasebna zabava</option>
                      <option>Drugo</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label for="gostje" class="form-label">Število gostov</label>
                    <input type="text" class="form-control" id="gostje" name="stevilo_gostov" placeholder="npr. 80" required>
                  </div>

                  <div class="col-12">
                    <label for="lokacija" class="form-label">Lokacija dogodka</label>
                    <input type="text" class="form-control" id="lokacija" name="lokacija" placeholder="Mesto ali lokacija dogodka" required>
                  </div>

                  <div class="col-12">
                    <label for="sporocilo" class="form-label">Dodatne želje</label>
                    <textarea
                      class="form-control"
                      id="sporocilo"
                      name="sporocilo"
                      rows="6"
                      placeholder="Opišite želje glede hrane, dekoracije, tipa postrežbe ali posebnih zahtev..."
                    ></textarea>
                  </div>

                  <div class="col-12 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mt-2">
                    <p class="small mb-0 text-muted">
                      Odgovorimo vam v najkrajšem možnem času.
                    </p>

                    <input type="hidden" name="stran" value="narocila">
                    <button type="submit" class="btn btn-main btn-lg px-5">
                      Pošlji povpraševanje
                    </button>
                  </div>

                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>


  <?php require_once __DIR__ . '/includes/footer.php'; ?>
