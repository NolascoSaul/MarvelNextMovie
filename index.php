<?php
    require_once("consts.php");
    require_once("functions.php");

    $data = get_data(API_URL);
    $until_message = get_until_message($data["days_until"]);
?> 

<?php
    render_template('head', ["title" => $data["title"]]);
    render_template('styles');
    render_template('main', array_merge(
        $data, 
        ["until_message" => $until_message]
    ));
?>