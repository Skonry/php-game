<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
    <style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: black;
    }
    .login_player_form {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 2px solid black;

    }
    .form_item {
        margin: 10px;
    }
    .form_item label {
        margin-right: 20px;
    }
    .error_message {
        color: red;
    }
    </style>
</head>
<body>
    <form action="/php-game-engine/login/login-verify" method="POST" class="login_player_form">
        <div class="form_item">
            <label for="player_login">Login</label>
            <input type="text" name="player_login">
        </div>
        <div class="form_item">
            <label for="player_password">Hasło</label>
            <input type="password" name="player_password">
        </div>
        <div class="form_item">
            <input type="submit" name="login_player">
        </div>
        <?php if (isset($this->data['error'])) { ?>
            <span class="error_message"><?php echo $this->data['error'] ?></span>
        <?php } ?>
    </form>
</body>
</html>
