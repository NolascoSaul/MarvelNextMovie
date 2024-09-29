<main>
    <section>
        <img 
            src="<?= $poster_url ?>" 
            width="300" 
            style= "border-radius: 6px;"
            alt="Poster de <?= $title; ?> "
        >
    </section>

    <hgroup>
        <h3><?= $title ?> - <?= $until_message ?> </h3>
        <p>Fecha de estreno: <?= $release_date ?></p>
        <p>La siguiente película es <?= $following_production["title"] ?></p>
    </hgroup>
</main>