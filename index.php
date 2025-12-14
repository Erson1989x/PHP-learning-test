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
        "PHP and MySQL Web Development by Luke Welling and Laura Thomson",
        "Learning PHP, MySQL & JavaScript by Robin Nixon",
        "PHP Cookbook by David Sklar and Adam Trachtenberg",
        "Modern PHP: New Features and Good Practices by Josh Lockhart",
        "Head First PHP & MySQL by Lynn Beighley and Michael Morrison",
        "PHP Objects, Patterns, and Practice by M. Y. Day",
        "The Joy of PHP Programming by Alan Forbes"
    ];
    ?>

    <ul>
        <?php foreach ($books as $book): ?>
            <li><?= htmlspecialchars($book) ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>