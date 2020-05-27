<article stlye="
    padding: 5px 20px;
    background: #eee;
    border-radius: 4px;
">
    <h1><?= $profile->name ?></h1>
    <p>
        <a
            title="Enviar E-mail"
            href="mailto:<?= $profile->email ?>"
        >
            Enviar E-mail
        </a>
    </p>
</article>