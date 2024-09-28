<?php
    $name = "Saúl";
    $isMale = true;
    $age = 9;

    $languages = ["PHP", "Java", "Python"];
    $languages[] = "Js";


    $person = [
        "name" => "Saúl",
        "age" => 17,
        "isDev" => true
    ];
?>

<h1>
    <?= print_r($person) ?>
</h1>

<style>
    :root{
        color-scheme: light dark;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body{
        display: grid;
        place-content: center;;
    }
</style>