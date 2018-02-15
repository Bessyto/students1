<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
</head>
<body>

    <h1>Students List</h1>
    <ol>
        <?php foreach (($students?:[]) as $student): ?>
            <li><?= ($student['last']) ?>, <?= ($student['first']) ?> </li>
        <?php endforeach; ?>
    </ol>

</body>
</html>