<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Review;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        $doctors = Doctor::all();
        $doctors_ids = $doctors->pluck('id');

        $votes = Vote::all();
        $votes_ids = $votes->pluck('id');

        $reviewsData = [
            [
                'name' => 'Mario',
                'message' => 'Il dottore è stato molto professionale, consiglio a tutti!',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 4,
            ],
            [
                'name' => 'Laura',
                'message' => 'Esperienza deludente, il dottore sembrava poco interessato.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 3,
            ],
            [
                'name' => 'Giovanni',
                'message' => 'Il dottore è stato molto gentile e disponibile.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 4,
            ],
            [
                'name' => 'Alessia',
                'message' => 'Molto delusa dalla visita, il dottore sembrava distratto.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 2,
            ],
            [
                'name' => 'Riccardo',
                'message' => 'Esperienza positiva, il dottore ha risposto a tutte le mie domande.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Sofia',
                'message' => 'Il dottore è stato professionale e cortese, lo consiglio.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 4,
            ],
            [
                'name' => 'Antonio',
                'message' => 'Esperienza neutra, nulla di eccezionale.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 3,
            ],
            [
                'name' => 'Giorgia',
                'message' => 'Il dottore ha spiegato chiaramente il mio problema, molto soddisfatta.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Luca',
                'message' => 'Non ho ricevuto le risposte che cercavo, esperienza deludente.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 2,
            ],
            [
                'name' => 'Martina',
                'message' => 'Il dottore è stato disponibile a risolvere ogni mio dubbio.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 4,
            ],
            [
                'name' => 'Andrea',
                'message' => 'Esperienza positiva, il dottore ha mostrato grande professionalità.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Valentina',
                'message' => 'Non consiglio questo medico, scarsa attenzione alle mie problematiche.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 2,
            ],
            [
                'name' => 'Simone',
                'message' => 'Il dottore ha risolto il mio problema in modo efficiente, consigliato.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Elisa',
                'message' => 'Il dottore ha mostrato grande competenza, sono molto soddisfatta.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Davide',
                'message' => 'Esperienza negativa, il dottore sembrava di fretta.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 2,
            ],
            [
                'name' => 'Roberta',
                'message' => 'Consiglio questo medico, ha risolto il mio problema con cura.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 4,
            ],
            [
                'name' => 'Giacomo',
                'message' => 'Il dottore è stato gentile, ma la visita è stata breve.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 3,
            ],
            [
                'name' => 'Francesco',
                'message' => 'Esperienza positiva, il dottore ha risposto a tutte le mie domande.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Elena',
                'message' => 'Il dottore ha spiegato chiaramente la mia situazione, consigliato.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 4,
            ],
            [
                'name' => 'Alessandro',
                'message' => 'Non sono soddisfatto della visita, il dottore sembrava distante.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 2,
            ],
            [
                'name' => 'Giulia',
                'message' => 'Il dottore ha risolto il mio problema con professionalità, lo consiglio.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 5,
            ],
            [
                'name' => 'Fabio',
                'message' => 'Esperienza neutra, nulla di particolare da segnalare.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 3,
            ],
            [
                'name' => 'Marta',
                'message' => 'Il dottore è stato molto gentile, ma la soluzione proposta non mi ha convinto.',
                'doctor_id' => $doctors_ids->random(),
                'vote_id' => 3,
            ],
        ];

        foreach ($reviewsData as $reviewData) {
            $new_review = new Review();
            $new_review->name = $reviewData['name'];
            $new_review->message = $reviewData['message'];
            $new_review->doctor_id = $reviewData['doctor_id'];
            $new_review->vote_id = $reviewData['vote_id'];
            $new_review->save();
        }
    }
}
