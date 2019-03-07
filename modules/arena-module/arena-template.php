<html>
    <head>
        <meta charset="utf-8">
        <title>Arena</title>
    </head>
    <body>
        <?php require 'menu-bar.php' ?>
        <h1>Arena</h1>
        <form action="/php-game-engine/arena/duel" method="POST">
            <label for="enemy_name">Login gracza</label>
            <input type="text" name="enemy_name">
            <input type="submit" name="challenge_enemy" value="Wyzwij">
        </form>
        <?php if ($this->data['validEnemy']) { ?>
            <p>Nieznanay login gracza</p>
        <?php } ?>
    </body>
</html>