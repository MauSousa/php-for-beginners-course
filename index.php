<?php
  $books = [
    [
      'name' => 'Do Androids Dream Of Electronic Sheep',
      'author' => 'Phillip K. Dick',
      'releaseYear' => 1968,
      'purchaseUrl' => 'http://example.com'
    ],
    [
      'name' => 'Project Hai Mary',
      'author' => 'Andy Weir',
      'releaseYear' => 2021,
      'purchaseUrl' => 'http://example.com'
    ],
    [
      'name' => 'The Martian',
      'author' => 'Andy Weir',
      'releaseYear' => 2011,
      'purchaseUrl' => 'http://example.com'
    ],
  ];

  $filteredBooks = array_filter($books, function($book) {
    return $book['releaseYear'] >= 1950 && $book['releaseYear'] <= 2020;
  });
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP For Beginners</title>
</head>

<body>
  <ul>
    <?php foreach($filteredBooks as $book): ?>
      <li>
        <a href="<?= $book['purchaseUrl']?>" target="_blank">
          <?= $book['name']; ?> (<?= $book['releaseYear'] ?>)
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</body>

</html>