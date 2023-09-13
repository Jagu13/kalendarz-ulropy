
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
            color: black;
            font-size: 10px;
        }

        html, body {
            height: 99%;
            position: relative;
        }
        fieldset {
            display: block;
            padding: 12px; 
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
        }
        div.wrapper {
            position: fixed;
            margin-top: 30%;
            margin-bottom: 30%;
            height: 40%;
        }

        .colorFieldHolidays {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: green;
        }

        .colorFieldOthers {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: red;
        }

        p {
            display: inline;
        }

    </style>
    <script>

    </script>
</head>
<body>
    <div class="wrapper">
        <form action="<?= base_url('calendar/index') ?>" method="get" target="calendarFrame">
        <fieldset>
            <legend>wyszukaj po</legend>
            <p>
                <label for="year">rok:</label>
                <input type="number" name="year" id="year"/>
                <br>
            </p>
            <p>
                <label for="months">miesiąc:</label>
                    <select id="months" name="months" id="months">
                        <option value="01">styczeń</option>
                        <option value="02">luty</option>
                        <option value="03">marzec</option>
                        <option value="04">kwiecień</option>
                        <option value="05">maj</option>
                        <option value="06">czerwiec</option>
                        <option value="07">lipiec</option>
                        <option value="08">sierpień</option>
                        <option value="09">wrzesień</option>
                        <option value="10">październik</option>
                        <option value="11">listopad</option>
                        <option value="12">grudzien</option>
                    </select>
            </p>

            <input type="submit" value="szukaj"/>
        </fieldset>
        
        </form>

        <form action="<?= base_url('calendar/index') ?>" method="get" target="calendarFrame">
        <fieldset>
            <legend>wyszukaj po</legend>
            <p>
                <label for="name">imię</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="surname">nazwisko</label>
                <input type="text" name="surname" id="surname">
            </p>

            <input type="submit" value="szukaj"/>
        </fieldset>
        </form>


        <fieldset>
            <legend>Legenda</legend>
            <div>
                <div class="colorFieldHolidays"></div>
                <p class="legend">urlop wypoczynkowy</p>
            </div>
            <br>
            <div>
                <div class="colorFieldOthers"></div>
                <p class="legend">inny rodzaj nieobecności</p>
            </div>
        </fieldset>
    </div>
</body>
</html>
