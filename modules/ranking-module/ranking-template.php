<html>
    <head>
        <meta charset="utf-8">
        <title>Ranking</title>
    </head>
    <body>
        <?php require 'menu-bar.php' ?>
        <h1>Ranking graczy</h1>
        <table>
            <thead>
                <th>Login</th>
                <th>Poziom</th>
                <th>Doświadczenie</th>
            </thead>
            <tbody>
            <?php foreach ($this->data['ranking'] as $player) { ?>
                <tr>
                    <td><?php echo $player['player_login'] ?></td>
                    <td><?php echo $player['experience_level'] ?></td>
                    <td><?php echo $player['experience_points'] ?></td>
                </tr>
            <?php } ?>
            </tbody>           
        </table>
    </body>
</html>