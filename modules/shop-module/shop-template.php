<html>
    <head>
        <meta charset="utf-8">
        <title>Sklep</title>
    </head>
    <body>
        <?php require 'menu-bar.php' ?>
        <h1>Sklep</h1>
        <h2>Przedmioty u sklpikarza</h2>
        <?php foreach ($this->data['shopItems'] as $item) { ?>
            <p><?php echo $item['name'], '-', $item['value']  ?></p>
        <?php } ?>
    </body>
</html>