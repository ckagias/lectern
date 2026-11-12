<?php
// Temporary page, replaced by the public library page in Phase 4.
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lectern</title>
</head>
<body>
    <h1>Lectern</h1>
    <p>Base path: <code><?= htmlspecialchars($base === '' ? '/' : $base, ENT_QUOTES) ?></code></p>
</body>
</html>
