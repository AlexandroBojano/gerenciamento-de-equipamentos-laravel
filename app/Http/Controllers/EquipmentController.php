<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;


class EquipmentController extends Controller
{
    public function equipamentsRegister(Request $request)
    {
        $data = $request->validate([
            'model' => 'required',
            'type' => 'required',
            'unit' => 'required',
            'glpi' => 'required',
            'patrimonio' => 'required',
            'status' => 'required',
            
        ]);

        Equipment::create($data);

        return redirect('/dashboard/admin/equipamentos/lista');
    }


    public function equipamentsForm()
    {
        
    
        return view('equipamentsForm');
    }

    public function equipamentsList()
    {

        $user = Equipment::all();
        
    
        return view('EquipamentsList', compact('user'));
    }

    public function show()
    {

        $user = Equipment::all();
        
    
        return view('showEquipaments', compact('user'));
    }

}
