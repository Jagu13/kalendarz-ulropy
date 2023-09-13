<?php

namespace App\Controllers;

use App\Models\Calendar_model;
use App\Controllers\DataTime;
use CodeIgniter\Controller;
use CodeIgniter\Database\Database;

class Calendar extends BaseController {

    public function index(): string {
        $model = new Calendar_model();

        //$data['events'] = $model->getAbsences();

        if ($this->request->getMethod() === 'post') {
            $year = $this->request->getPost('year');
            $month = $this->request->getPost('months');
            $data['events'] = $model->getAbsencesByDate($year, $month);
        } else {
            // Jeśli formularz nie został przesłany, pobierz wszystkie wydarzenia
            $data['events'] = $model->getAbsences();
        }

        $events = []; //tablica danych z bazy danych

        $data['selectedDate'] = date('Y-m-d');

        //pętla wypełniająca tablicę danymi
        foreach ($data['events'] as $event) {

            $startDate = new \DateTime($event->dataOd);
            $endDate = new \DateTime($event->dataDo);

            if ($startDate != $endDate) {
                $endDate->modify('+1 day');
            }
            
            $events[] = [
                'title' => $event->imie . ' ' . $event->nazwisko,
                'start' => $startDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d'),
                'description' => $event->grupaAbsencji
            ];
        }

        // Teraz $events zawiera dane w odpowiednim formacie
        $data['events'] = $events;

        // Pobierz ostatnie wykonane zapytanie
        $query = $model->getLastQuery(); 
    
        return view('calendar', $data);
    }

    public function search(/*$year, $month*/) {
        $model = new Calendar_model();

        //pobieranie roku i miesiąca
        $year = $this->request->getGet('year');
        $month = $this->request->getGet('months');
        $data['events'] = $model->getAbsencesByDate($year, $month);

        $data['selectedDate'] = $year . '-' . $month . '-01';
    
        $events = []; //tablica danych z bazy danych

        //pętla wypełniająca tablicę danymi
        foreach ($data['events'] as $event) {

            $startDate = new \DateTime($event->dataOd);
            $endDate = new \DateTime($event->dataDo);

            if ($startDate != $endDate) {
                $endDate->modify('+1 day');
            }
            
            $events[] = [
                'title' => $event->imie . ' ' . $event->nazwisko,
                'start' => $startDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d'),
                'description' => $event->grupaAbsencji
            ];
        }

        $data['events'] = $events;

        // Pobierz ostatnie wykonane zapytanie
        $query = $model->getLastQuery();



        // Przekazanie danych do widoku i renderowanie go
        return view('calendar', $data);
    }

}