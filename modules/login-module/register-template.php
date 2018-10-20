<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rejestracja</title>
    <style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* This pattern is downloaded from www.toptal.com/designers/subtlepatterns/ */
        /* background-image: url("../assets/pink dust.png"); */
        color: black;
    }
    .register_player_form {
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
    <form action="/php-game-engine/register/register-verify" method="POST" class="register_player_form">
        <div class="form_item">
            <label for="player_login">Login</label>
            <input type="text" name="player_login">
        </div>
        <?php if (isset($this->data['login_error'])) { ?>
            <span class="error_message"><?php echo $this->data['login_error'] ?></span>
        <?php } ?>
        <div class="form_item">
            <label for="player_password">Hasło</label>
            <input type="password" name="player_password">
        </div>
        <?php if (isset($this->data['password_error'])) { ?>
            <span class="error_message"><?php echo $this->data['password_error'] ?></span>
        <?php } ?>
        <div class="form_item">
            <label for="player_email">E-mail</label>
            <input type="text" name="player_email">
        </div>
        <?php if (isset($this->data['email_error'])) { ?>
            <span class="error_message"><?php echo $this->data['email_error'] ?></span>
        <?php } ?>
        <div class="form_item">
            <input type="submit" name="register_player">
        </div>
    </form>
</body>
</html>


