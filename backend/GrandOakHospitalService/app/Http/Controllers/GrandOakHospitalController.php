<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\_CRUD\Crud_model;
use GuzzleHttp\Client;

class GrandOakHospitalController extends Controller
{

    public function index(){
        return "This is Grand Oak Hospital Service";
    }

    public function getDoctor($doctorType)
    {
        try {

            if ($doctorType === 'Ophthalmologist') {
                $doctors = [
                    [
                        "name"=> "John Mathew",
                        "time"=> "03:30 PM",
                        "hospital"=> "Grand Oak"
                    ],
                    [
                        "name"=> "Allan Silvester",
                        "time"=> "04:30 PM",
                        "hospital"=> "Grand Oak"
                    ]
                ];
            } elseif ($doctorType === 'Physician') {
                $doctors = [
                    [
                        "name"=> "Shane Martin",
                        "time"=> "07:30 AM",
                        "hospital"=> "Grand Oak"
                    ]
                    ,
                    [
                        "name"=> "Geln Ivan",
                        "time"=> "08:30 AM",
                        "hospital"=> "Grand Oak"
                    ]
                ];
            } elseif ($doctorType === 'Pediatrician') {
                $doctors = [
                    [
                        "name"=> "Bob Watson",
                        "time"=> "05:30 PM",
                        "hospital"=> "Grand Oak"
                    ],
                    [
                        "name"=> "Paul Johnson",
                        "time"=> "07:30 AM",
                        "hospital"=> "Grand Oak"
                    ]
                ];
            } else {
                return response()->json(['message' => 'No doctors available for the provided doctorType'], 404);
            }

            return response()->json(['doctors' => ['doctor' => $doctors]]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}