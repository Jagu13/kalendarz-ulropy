<?php

namespace App\Controllers;
use App\Models\Calendar_model;

class Data extends BaseController
{
    public function getData() {
        $model = new Calendar_model();
        $data['events'] = $model->getAbsences();
    
        $events = []; //tablica danych z bazy danych
        
        //pętla wypełniająca tablicę danymi
        foreach ($data['events'] as $event) {
            $events[] = [
                'title' => $event->imie . ' ' . $event->nazwisko,
                'start' => $event->dataOd,
                'end' => $event->dataDo,
                'description' => $event->grupaAbsencji,
            ];
        }

        // Teraz $events zawiera dane w odpowiednim formacie
        $data['events'] = $events;

        //wyświetl dane
        dd($events);
     }

}