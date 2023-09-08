
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
        
        function filterCalendar() {
            var year = document.getElementById('year').value;
            var month = document.getElementById('months').value;

            //nowe źródło dla drugiego iframe z kalendarzem
            var calendarFrame = parent.document.getElementsById('calendarFrame')[0];
            calendarFrame.src = '<?= base_url('dupa') ?>' + '?year=' + year + '&months=' + month;
        }
    </script>
        <!-- wysyłanie zapytania z tej strony -->
    <script>
        function updateCalendar() {
            var year = document.getElementById('year').value;
            var month = document.getElementById('months').value;

            // Wysyłanie danych do drugiego iframe
            window.parent.postMessage({ year: year, month: month }, '*');
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <form action="<?= base_url('calendar/index') ?>" method="get">
        <fieldset>
            <legend>wyszukaj po</legend>
            <p>
                <label for="rok">rok:</label>
                <input type="number" name="year" id="year"/>
                <br>
            </p>
            <p>
                <label for="miesiac">miesiąc:</label>
                    <select id="months" name="months">
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

        <form action="get">
        <fieldset>
            <legend>wyszukaj po</legend>
            <p>
                <label for="name">imię</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="surname">nazwisko</label>
                <input type="text" name="surname">
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
