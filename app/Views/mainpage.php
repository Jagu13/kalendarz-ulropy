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
        function filterCalendar() {
            //pobieramy nowe dane
            var year = document.getElementById('year').value;
            var month = document.getElementById('months').value;

            // nowe źródło dla drugiego iframe z kalendarzem
            var calendarFrame = window.parent.document.getElementsById('calendarFrame')[0];
            calendarFrame.src = '<?= base_url('dupa') ?>' + '?year=' + year + '&months=' + month;
        }
   
        // <!-- wysyłanie zapytania z tej strony -->
        function updateCalendar() {
            var year = document.getElementById('year').value;
            var month = document.getElementById('months').value;

            // Wysyłanie danych do drugiego iframe
            window.parent.postMessage({ year: year, month: month }, '*');
        }  

    </script>
</head>

<body>        
    <?php $zmienna = 'http://192.168.15.144';       
    ?>
        
    <!-- <iframe src="http://192.168.15.144/search" frameborder="1" class="firstPage" id="searchFrame"></iframe> -->
    <iframe src="<?php echo $zmienna . '/search';?>" frameborder="0" class="firstPage" id="searchFrame"></iframe>
        
    <!-- <iframe height="100%" color="blue" src="<?= base_url('calendar/index') ?>" frameborder="1" class="secondPage" id="calendarFrame" name="calendarFrame"></iframe> -->
    <!-- <iframe height="100%" color="blue" src="http://192.168.15.144/calendar/index" frameborder="1" class="secondPage" id="calendarFrame" name="calendarFrame"></iframe> -->
        <iframe height="100%" color="blue" src="<?php echo $zmienna . '/calendar/index';?>" frameborder="0" class="secondPage" id="calendarFrame" name="calendarFrame"></iframe>
    <script>
        //zbędne
    // var searchFrame = document.getElementById("searchFrame");
    //     var cos = searchFrame.contentDocument;
    //     console.log(cos);
    //     cos.filterCalendar();

        window.addEventListener('message', function(event) {
            if (event.origin !== <?php echo $zmienna . '/search';?>) {
                return;
            } 
            
            // Odbierz przekazane dane
            var year = event.data.year;
            var month = event.data.month;

            // aktualizacja prawej strony z kalendarzem
            var calendarFrame = document.getElementById('calendarFrame');
            console.log(calendarFrame);
            calendarFrame.src = '<?= base_url('calendar/search') ?>' + '?year=' + year + '&months=' + month;             
        });
    </script>
</body>
</html>