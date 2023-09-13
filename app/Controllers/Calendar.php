<?php

namespace App\Controllers;

use App\Models\Calendar_model;
use App\Controllers\DataTime;
use CodeIgniter\Controller;
use CodeIgniter\Database\Database;

class Calendar extends BaseController {

    public function index() {
        $model = new Calendar_model();

        //pobieranie imienia i nazwiska
        $name = $this->request->getGet('name');
        $surname = $this->request->getGet('surname');

        //pobieranie roku i miesiąca
        $year = $this->request->getGet('year');
        $month = $this->request->getGet('months');

            if ($name != null && $surname != null) {
               $data['events'] = $model->getAbsencesByFullName($name, $surname);
               $data['selectedDate'] = date('Y-m-d');         
            } elseif ($name != null && $surname == null) {
                $data['events'] = $model->getAbsencesByName($name);
                $data['selectedDate'] = date('Y-m-d');
            } elseif ($name == null && $surname != null) {
                $data['events'] = $model->getAbsencesBySurname($surname);
                $data['selectedDate'] = date('Y-m-d');
            } elseif ($year != null && $month != null) {
                $data['events'] = $model->getAbsencesByDate($year, $month);
                $data['selectedDate'] = $year . '-' . $month . '-01';
            } else {
                $data['events'] = $model->getAbsences();
                $data['selectedDate'] = date('Y-m-d');
            }
 
    
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