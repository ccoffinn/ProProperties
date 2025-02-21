<?php
$title = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title); ?></title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F0EAD6;
        }
        .header {
            background-color: #D6DCF0;
            color: black;
            text-align: center;
            padding: 15px;
            font-size: 24px;
        }
    </style>
</head>
<body>

<div class="header">
    <?php echo ($title); ?>
</div>