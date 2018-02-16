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
            <li><a href= "<?= ($BASE) ?>/summary/<?= ($student['sid']) ?>">
                <?= ($student['last']) ?>, <?= ($student['first']) ?> </a> </li>
        <?php endforeach; ?>
    </ol>

    <a href="<?= ($BASE) ?>/add">Add a Student</a>

</body>
</html>