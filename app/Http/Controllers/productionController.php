<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Production;
use App\Production_record;
use App\DB;
use Yajra\DataTables\DataTables;
use Validator;
class productionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Production $production)
    {
        $production = Production::get();
        return view('production')->withProduction($production);
    }

    public function  getdata(Request $request)
    {
        $production = Production::where('watchman','=',$request->watchman)->get();
        return view('production')->withProduction($production);

    }

    public function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'watchman' => 'required',
            'bday'  => 'required',
            'sex'  => 'required',
            'contact'  => 'required',
            'address'  => 'required',

        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }

        }
        else
        {
            $production = new Production([
                'watchman'    =>  $request->get('watchman'),
                'bday'     =>  $request->get('bday'),
                'sex'     =>  $request->get('sex'),
                'contact'     =>  $request->get('contact'),
                'address'     =>  $request->get('address'),

            ]);
            $production->save();
            $watchman = '<option value="'.$production->id.'" selected>'.$production->watchman.'</option>';
            $success_output = '<div class="alert alert-success">Data Inserted</div>';

        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output,
            'append_to' => $watchman,
        );
        echo json_encode($output);
    }

//production

    public function prod_data(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'watchman_id' => 'required',
            'date' => 'required',
            'trays_count' => 'required',
            'pieces' => 'required',
            'cracks' => 'required',
            'mortality' => 'required',
            'description' => 'required',

        ]);



         $production_record = new Production_record([
                'watchman_id' => $request->get('watchman_id'),
                'date' => $request->get('date'),
                'trays_count' => $request->get('trays_count'),
                'pieces' => $request->get('pieces'),
                'cracks' => $request->get('cracks'),
                'mortality' => $request->get('mortality'),
                'description' => $request->get('description'),


            ]);
            $production_record->save();
            return redirect()->route('production')->with('production_record');




    }

}

