<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lerning</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        text-align: center;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<body>
    <h1>
        Recomanded Books
    </h1>

    <?php
    $books = [
        [
           "name" => "The Pragmatic Programmer by Andrew Hunt and David Thomas",
           "author" => "Andrew Hunt and David Thomas",
           "year" => 1999,
           "purcheUrl" => "https://www.example.com/pragmatic-programmer"
        ],
        [
            "name" => "Clean Code: A Handbook of Agile Software Craftsmanship by Robert C. Martin",
            "author" => "Robert C. Martin",
            "year" => 2008,
            "purcheUrl" => "https://www.example.com/clean-code"
        ],
        [
            "name" => "Introduction to Algorithms by Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, and Clifford Stein",
            "author" => "Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, and Clifford Stein",
            "year" => 2009,
            "purcheUrl" => "https://www.example.com/introduction-to-algorithms"
        ]
    ];

    function filterByAuthor($books, $author = null) {
        // If no author provided, return all books
        if ($author === null) {
            return $books;
        }

        $filtredBooks = [] ;
        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filtredBooks[] = $book;
            }
        }
        return $filtredBooks;
    }
    ?>

    <ul>
        <?php foreach (filterByAuthor($books, "Robert C. Martin") as $book): ?>
            <li>
                <strong><?= $book['name']; ?></strong> by <?= $book['author']; ?> (<?= $book['year']; ?>) - 
                <a href="<?= $book['purcheUrl']; ?>">Purchase Here</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>