<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pokedex</title>
</head>
<body>
  <h1>Pokedex</h1>
  <hr>
  <form action="/" method="post">
    <?php foreach ($pokemons as $pokemon): ?>
      <a href="/pokemon/<?= $pokemon->getId() ?>">
        <h2><?= $pokemon->getName() ?></h2>
      </a>
      <button type="submit" name="free" value="<?= $pokemon ->getId() ?>">Libérer</button>
      <hr>
    <?php endforeach ?>
  
    <p>Un pokemon sauvage apparait, <?= $randomPokemon->getName() ?> est dans la place !</p>
    <div>
      <button type="submit" name="capture" value="<?= $randomPokemon->getId() ?>">Capturer</button>
      <button type="submit" name="letItBe" value="<?= $randomPokemon->getId() ?>">Laisser tranquille</button>
    </div>
  </form>
</body>
</html>