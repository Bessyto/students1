<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student</title>
</head>
<body>
    <h3>Student added successfully</h3>

        <p> <?= ($student['first']) ?> <?= ($student['last']) ?></p>
    <p>SID: <?= ($student['sid']) ?></p>
    <p>GPA: <?= ($student['gpa']) ?></p>
<?php if ($student['gpa'] >= 2.0): ?>
    <p>Passing</p>
    <?php else: ?><p>Failing</p>
<?php endif; ?>



</body>
</html>