<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal</title>
</head>

<body>
  <?php if ($_POST==[]) : ?>
    <!-- Tampilan No 1 -->
    <form action="" method="POST">
      Input Jumlah Baris <input name="jumlah-baris" type="number" min="0" max="10000" /><br>
      Input Jumlah Kolom <input name="jumlah-kolom" type="number" min="0" max="10000" /><br>
      <button type="submit" name="soal1a">SUBMIT</button><br>
    </form>
  <?php endif ?>



  <?php if (isset($_POST['soal1a'])) : ?>
    <!-- Tampilan No 2 -->
    <form action="" method="POST">
      <?php for ($baris = 1; $baris <= $_POST['jumlah-baris']; $baris++) : ?>
        <?php for ($kolom = 1; $kolom <= $_POST['jumlah-kolom']; $kolom++) : ?>
          <?= $baris ?>.<?= $kolom ?>: <input name="<?= $baris ?>-<?= $kolom ?>" type="text" />
        <?php endfor ?>
        <br>
      <?php endfor ?>
      <button type="submit" name="soal1b">SUBMIT</button><br>
    </form>
  <?php endif ?>


  <?php if (isset($_POST['soal1b'])) : ?>
    <?php array_pop($_POST) ?>
    <!-- Tampilan No 3 -->
    <?php foreach ($_POST as $key => $value) { ?>
      <span style="font-weight: bold;">
        <?= str_replace("-", ".", $key) ?> : <?= $value ?></span><br>
    <?php } ?>
  <?php endif ?>


</body>

</html>