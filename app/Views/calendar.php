<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz urlopowy</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    wersja 5.1.0 -->

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">

    
    <style>

        * {
            font-family: 'Roboto';
            font-weight: 300;
        }
 
        .event-padding {
            padding: 2px;
        }

        .fc-h-event{
            border: none;
        }

    </style>
        
</head>
<body>
    <div id="calendar"></div> 

    <script>
        // ścieżka do jezyk.json
        var plJsonUrl = '<?= base_url('jezyk.json') ?>'; 

        initialDate = '<?=$selectedDate?>';
        
        // generowanie kalendarza z FullCalendara, przypisywanie właściwości
        document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    firstDay: 1, //poniedziałek
                    locale: 'pl',
                    initialView: 'dayGridMonth',
                    initialDate: initialDate,
                    eventOrder: 'imie',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek',
            },
            
            //przekazanie danych z urlopami
            events: <?= json_encode($events) ?>,
            
            //tłumaczenie
            buttonText: {
                today: 'Dziś',
                month: 'Miesiąc',
                week: 'Tydzień',
            },
    
        eventContent: function (info) {
                // Tworzenie niestandardowej zawartości wydarzenia
                var eventContent = document.createElement('div');
                eventContent.innerHTML = '<b>' + info.event.title + '</b>';
                
                // Dostosowywanie koloru tła i obramowania w zależności od opisu
                var backgroundColor = getEventColor(info.event.extendedProps.description);
                var fontColor = 'white';
                var borderColor = 'black';
                eventContent.style.backgroundColor = backgroundColor;
                eventContent.style.borderColor = backgroundColor;
                eventContent.style.color = fontColor;
                eventContent.classList.add('event-padding');
                
                return { domNodes: [eventContent] }; //domNodes - dodawanie niestandardowych elementów do DOM (tablicy)
            },
        });
        calendar.render();
        });

        //Przypisanie kolorów do odpowiednich rodzajów absencji
        function getEventColor(grupaAbsencji) {
                    grupaAbsencji = grupaAbsencji.toLowerCase(); // Zamiana na małe litery

                    if (grupaAbsencji.includes('urlopy wypoczynkowe')) {
                        return 'green';
                    // Kolor dla urlopów wypoczynkowych (zielony)
                    } else {
                        return 'red'; // Domyślny kolor (czerwony) dla pozostałych
                    }
        }

    </script>
</body>
</html>