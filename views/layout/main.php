<!DOCTYPE html>
<html>
<head>
    <title>Quản lý nhân viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Quản lý nhân viên</a>
    </nav>
    <div class="container">
        <?= isset($content) ? $content : '' ?>
    </div>
</body>
</html>