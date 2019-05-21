<?php

namespace App\Http\Controllers;
use App\Production_record;
use Illuminate\Http\Request;
use App\DB;

class Egg_productionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Production_record $production_record)
    {
        $production_record = Production_record::join('watchman', 'production_record.watchman_id', '=', 'watchman.watchman_id')
            ->orderBy('date', 'desc')
            ->get();
        return view('egg_production' , array('production_record' => $production_record));
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = Production_record::join('watchman', 'production_record.watchman_id', '=', 'watchman.watchman_id')
                    ->where('production_record.watchman_id', 'like', '%'.$query.'%')
                    ->orWhere('date', 'like', '%'.$query.'%')
                    ->orWhere('watchman.watchman', 'like', '%'.$query.'%')
                    ->orWhere('production_record.trays_count', 'like', '%'.$query.'%')
                    ->orWhere('production_record.pieces', 'like', '%'.$query.'%')
                    ->orWhere('production_record.cracks', 'like', '%'.$query.'%')
                    ->orWhere('production_record.mortality', 'like', '%'.$query.'%')
                    ->orWhere('production_record.description', 'like', '%'.$query.'%')
                    ->orderBy('date', 'desc')
                    ->get();

            }
            else
            {
                $data = Production_record::join('watchman', 'production_record.watchman_id', '=', 'watchman.watchman_id')
                    ->orderBy('date', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr class="border-bottom" style="color: snow; font-family: Andalus">
         <td>' . $row->watchman . '</td>
         <td>' . $row->date . '</td>
         <td>' . $row->trays_count . '</td>
         <td>' . $row->pieces . '</td>
         <td>' . $row->cracks . '</td>
         <td>' . $row->mortality . '</td>
         <td>' . $row->description . '</td>
         <td><a href="">Edit</a>/<a href="">delete</a></td>

         
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }



}
