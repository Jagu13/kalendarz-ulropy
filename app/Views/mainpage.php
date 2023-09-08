<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            box-sizing: border-box;

        }

        html, body {
            height: 99%;
        }
        .firstPage {
            width: 19%;
            height: 100%;
        }

        .secondPage {
            width: 80%;
            height: 100%;
        }
        
    </style>
    <script>
        window.addEventListener('message', function(event) {
            if (event.origin !== 'http://localhost/search') {
                return;
            } 
                // Odbierz przekazane dane
            var year = event.data.year;
            var month = event.data.month;


            document.addEventListener('DOMContentLoaded', function() {
                console.log(year);
            });

            
            // aktualizacja prawej strony z kalendarzem
            var calendarRightFrame = document.getElementById('calendarFrame');
            console.log(calendarRightFrame);
            calendarRightFrame.src = '<?= base_url('calendar/search') ?>' + '?year=' + year + '&months=' + month;
                        
        });
    </script>
</head>

<body>
    <iframe src="<?= base_url('search') ?>" frameborder="1" class="firstPage"></iframe>
    <iframe height="100%" color="blue" src="<?= base_url('calendar/index') ?>" frameborder="1" class="secondPage" id="calendarFrame"></iframe>
</body>
</html>