<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use Yajra\DataTables\DataTables;
use Validator;

class egg_salesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('egg_sales');
    }

    function getdata()
    {
        $transaction = transaction::select('id', 'date', 'type', 'amount', 'description', 'No_trays', 'No_pieces', 'Cracks');
        return Datatables::of($transaction)
            ->addColumn('action', function($transaction){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$transaction->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $transaction = transaction::find($id);
        $output = array(
            'date'    =>  $transaction->date,
            'type'     =>  $transaction->type,
            'amount'     =>  $transaction->amount,
            'description'     =>  $transaction->description,
            'No_trays'     =>  $transaction->No_trays,
            'No_pieces'     =>  $transaction->No_pieces,
            'Cracks'     =>  $transaction->Cracks
        );
        echo json_encode($output);
    }


    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'date' => 'required',
            'type'  => 'required',
            'amount'  => 'required',
            'No_trays'  => 'required',
            'No_pieces'  => 'required',
            'Cracks'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $transaction = new Student([
                    'date'    =>  $request->get('date'),
                    'type'     =>  $request->get('type'),
                    'amount'     =>  $request->get('amount'),
                    'No_trays'     =>  $request->get('No_trays'),
                    'No_pieces'     =>  $request->get('No_pieces'),
                    'Cracks'     =>  $request->get('Cracks'),
                    'description'     =>  $request->get('description')
                ]);
                $transaction->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $transaction = transaction::find($request->get('transaction_id'));
                $transaction->date = $request->get('date');
                $transaction->type = $request->get('type');
                $transaction->amount = $request->get('type');
                $transaction->No_trays = $request->get('type');
                $transaction->No_pieces = $request->get('type');
                $transaction->Cracks = $request->get('type');
                $transaction->description = $request->get('type');
                $transaction->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }

        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }


}

