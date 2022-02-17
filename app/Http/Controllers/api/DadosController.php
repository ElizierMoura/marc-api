<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dados;

class DadosController extends Controller
{
    
    public function __construct()
{

}

    public function index(Request $request, $start = null, $end = null)
    {
        // print_r("antes");
        $db = Dados::query()->leftJoin('informacoes_extra', 'exames.mneumonico_exame', 'informacoes_extra.codigo');
        // $url = $request->url();
        $search = $request->query('search');
       

        if (empty($search) == false) {
            $db = $db->where('exames.nome_exame', 'LIKE', '%'.$search.'%')
            ->orWhere('informacoes_extra.codigosus', 'LIKE', '%'.$search.'%')
            ->orWhere('exames.mneumonico_exame', 'LIKE', '%'.$search.'%');
        }


        $data['clientes'] = $db->paginate(20);
        return [$data['clientes']];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
