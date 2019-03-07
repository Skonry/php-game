<html>
<head>
    <meta charset="utf-8">
    <title>Wyprawa</title>
</head>
<body>
    <?php require 'menu-bar.php' ?>
    <?php if ($this->data['expeditionStatus'] === 'isAtHome') { ?>
        <h1>Udaj się na wyprawę!</h1>
        <form action="expedition/send-to-expedition" method="POST">
            <select name="expedition_time" id="">
                <option value="15">15 minut</option>
                <option value="30">30 minut</option>
                <option value="60">1 godzina</option>
                <option value="180">3 godziny</option>
                <option value="480">8 godzin</option>
                <option value="1440">24 godzin</option>
            </select>
            <input type="submit" value="Na przygodę!">
        </form>
    <?php } else if ($this->data['expeditionStatus'] === 'justReturned') { ?>
        <h1>Wróciłeś z wyprawy</h1>
        <h3>Otrzymałeś XXX złota</h3>
    <?php } else { ?>
        <div class="expedition_timer"></div>
        <form action="expedition/cancel-expedition" method="POST">
            <button name="cancel_expedition">Wycofaj się wyprawy</button>
        </form>
        <script>
            (function() {
                const endOfExpeditionTime = new Date('<?php echo $this->data['endOfExpedition']; ?>');
                const interval = setInterval(() => {
                    const currentDate = new Date();
                    const diff = endOfExpeditionTime - currentDate;
                    let leftTime;
                    if (diff < 0) {
                        clearInterval(interval);
                        leftTime = 'Wróciłeś z wyprawy. Odśwież, aby wyświetlić resultat.';
                    }
                    else {
                        const result = new Date(diff);
                        if (currentDate.getTimezoneOffset() !== result.getTimezoneOffset()) {
                            const difference = currentDate.getTimezoneOffset() - result.getTimezoneOffset();
                            result.setMinutes(result.getMinutes() + difference);
                            console.log(result);
                        }
                        leftTime = result.toTimeString().slice(0, 8);
                    }
                    document.querySelector('.expedition_timer').textContent = leftTime;
                }, 1000);
            })();
        </script>
    <?php } ?>
</body>
</html>
