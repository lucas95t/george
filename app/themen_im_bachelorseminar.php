<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DBController;
class themen_im_bachelorseminar extends Model
{
    //
    protected $table = 'themen_im_bachelorseminar';
    // Funktion um die Themen vom Hausarbeitseminar aus der DB zu holen
    public static function getModelThemen($seminar)
    {
        $modelthemen = DB::table('themen_im_bachelorseminar')
        ->join('Veranstaltung','themen_im_bachelorseminar.ID_Veranstaltung', '=', 'Veranstaltung.ID_Veranstaltung')
        ->where('Veranstaltung.Name', $seminar)
        ->select('themen_im_bachelorseminar.Thema')
        ->get();
    return $modelthemen;
    }

    public static function getModelThemen_nachMitarbeiter($seminar, $mitarbeiter)
    {
        $modelthemen_nachMitarbeiter = DB::table('themen_im_bachelorseminar')
        ->join('Veranstaltung','themen_im_bachelorseminar.ID_Veranstaltung', '=', 'Veranstaltung.ID_Veranstaltung')
        ->where('Veranstaltung.Name', $seminar)
        ->where('themen_im_bachelorseminar.Betreuer', $mitarbeiter)
        ->select('themen_im_bachelorseminar.Thema', 'themen_im_bachelorseminar.Nummer')
        ->get();
    return $modelthemen_nachMitarbeiter;
    }

}