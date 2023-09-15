<?php

namespace App\Controllers;

use App\Models\Calendar_model;
use CodeIgniter\Controller;

class Search extends BaseController
{
    public function index()
    {
        return view('search');
    }

    public function search() {
        $model = new Calendar_model();

        //pobieranie roku i miesiąca
        $year = $this->request->getPost('year');
        $month = $this->request->getPost('months');
        $data['events'] = $model->getAbsencesByDate($year, $month);
    
        $events = []; //tablica danych z bazy danych

        //pętla wypełniająca tablicę danymi
        foreach ($data['events'] as $event) {

            $startDate = new \DateTime($event->dataOd);
            $endDate = new \DateTime($event->dataDo);
            
            //zliczanie ostatniego dnia urlopu jako urlop
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

        // Pobieranie ostatnio wykonanego zapytania
        $query = $model->getLastQuery();

        // Przekazanie danych do widoku i renderowanie go
        return view('calendar', $data);
    }
}