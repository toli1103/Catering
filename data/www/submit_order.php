<?php

session_start();

$pageTitle = 'Povpraševanje poslano | Okus po domu';
$activePage = 'narocila';
require_once __DIR__ . '/includes/db.php';

$statusMessage = '';
$statusClass = 'alert-info';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imePriimek = trim($_POST['ime_priimek'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefon = trim($_POST['telefon'] ?? '');
    $datum = trim($_POST['datum_dogodka'] ?? '');
    $dogodek = trim($_POST['vrsta_dogodka'] ?? '');
    $gostje = trim($_POST['stevilo_gostov'] ?? '');
    $lokacija = trim($_POST['lokacija'] ?? '');
    $sporocilo = trim($_POST['sporocilo'] ?? '');
    $stran = trim($_POST['stran'] ?? 'neznano');

    if ($imePriimek === '' || $email === '' || $telefon === '' || $datum === '' || $dogodek === '' || $gostje === '' || $lokacija === '') {
        $statusMessage = 'Prosimo izpolnite vsa obvezna polja.';
        $statusClass = 'alert-danger';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $statusMessage = 'Prosimo vnesite veljaven e-poštni naslov.';
        $statusClass = 'alert-danger';
    } elseif (!ctype_digit($gostje) || (int)$gostje < 1) {
        $statusMessage = 'Prosimo vnesite veljavno število gostov.';
        $statusClass = 'alert-danger';
    } elseif (!$pdo) {
        $statusMessage = 'Prišlo je do napake. Poskusite znova.';
        $statusClass = 'alert-danger';
    } else {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare('SELECT id_stranka FROM stranka WHERE email = :email');
            $stmt->execute([':email' => $email]);
            $idStranka = $stmt->fetchColumn();

            if (!$idStranka) {
                $stmt = $pdo->prepare(
                    'INSERT INTO stranka (ime_priimek, email, telefon)
                    VALUES (:ime_priimek, :email, :telefon)'
                );
                $stmt->execute([
                    ':ime_priimek' => $imePriimek,
                    ':email' => $email,
                    ':telefon' => $telefon,
                ]);
                $idStranka = (int)$pdo->lastInsertId();
            } else {
                $stmt = $pdo->prepare(
                    'UPDATE stranka SET ime_priimek = :ime_priimek, telefon = :telefon WHERE id_stranka = :id_stranka'
                );
                $stmt->execute([
                    ':ime_priimek' => $imePriimek,
                    ':telefon' => $telefon,
                    ':id_stranka' => $idStranka,
                ]);
            }

            $stmt = $pdo->prepare('SELECT id_vrsta_dogodka FROM vrsta_dogodka WHERE naziv = :naziv');
            $stmt->execute([':naziv' => $dogodek]);
            $idVrsta = $stmt->fetchColumn();

            if (!$idVrsta) {
                throw new PDOException('Izbrana vrsta dogodka ni veljavna.');
            }

            $stmt = $pdo->prepare(
                'INSERT INTO povprasevanje
                (id_stranka, id_vrsta_dogodka, datum_dogodka, stevilo_gostov, lokacija, dodatne_zelje)
                VALUES (:id_stranka, :id_vrsta_dogodka, :datum_dogodka, :stevilo_gostov, :lokacija, :dodatne_zelje)'
            );
            $stmt->execute([
                ':id_stranka' => $idStranka,
                ':id_vrsta_dogodka' => $idVrsta,
                ':datum_dogodka' => $datum,
                ':stevilo_gostov' => (int)$gostje,
                ':lokacija' => $lokacija,
                ':dodatne_zelje' => $sporocilo !== '' ? $sporocilo : null,
            ]);

            $pdo->commit();

            $statusMessage = 'Hvala za vašo oddajo.';
            $statusClass = 'alert-success';
        } catch (PDOException $e) {
            if ($pdo && $pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $statusMessage = 'Prišlo je do napake. Poskusite znova.';
            $statusClass = 'alert-danger';
        }
    }
} else {
    $statusMessage = 'Obrazec je bil poslan napačno.';
    $statusClass = 'alert-warning';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_status'] = [
        'message' => $statusMessage,
        'class' => $statusClass,
    ];

    $redirectUrl = $stran === 'home' ? 'index.php#narocila' : 'narocila.php#narocila';
    header('Location: ' . $redirectUrl);
    exit;
}

require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="intro-section py-5">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <span class="section-label">Povratna informacija</span>
          <h1>Stanje pošiljanja povpraševanja</h1>
          <div class="alert <?= $statusClass ?> mt-4" role="alert">
            <?= htmlspecialchars($statusMessage, ENT_QUOTES, 'UTF-8') ?>
          </div>
          <div class="mt-4">
            <a href="narocila.php" class="btn btn-main btn-lg me-2">Nazaj na naročila</a>
            <a href="index.php" class="btn btn-outline-secondary btn-lg">Domov</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
