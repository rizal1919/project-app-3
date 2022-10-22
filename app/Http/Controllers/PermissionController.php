<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    // public $getData = json_decode(file_get_contents("http://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json"));

    public $getData = '';
    public $getCity = '';

    public function index(Request $request){

        $data = Permission::Filter(Request(['search']))->orderByDesc('id')->paginate(3)->withQueryString();

        return view('perdin.index', [
            'datas' => $data
        ]);
    }

    public function show(Permission $permission){

        return view('perdin.show', [
            'data' => $permission
        ]);
    }

    public function create(){

        
        $this->getData = json_decode(file_get_contents("http://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json"));

        return view('/perdin.create', [
            'cities' => $this->getData
        ]);
    }

    public function store(Request $request){

        

        $this->getCity = json_decode(file_get_contents("https://emsifa.github.io/api-wilayah-indonesia/api/regency/$request->city.json"));
        
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'leaveTime' => 'required',
            'arriveTime' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'city.required' => 'Kota harus dipilih',
            'leaveTime.required' => 'Tanggal Keberangkatan Harus diisi',
            'arriveTime.required' => 'Tanggal Tiba harus diisi'
        ]);

        $validatedData['city'] = $this->getCity->name;
        
        Permission::create($validatedData);

        return redirect('/perdin')->with('success', 'Berhasil');

    }

    public function updateView(Permission $permission){

        $this->getData = json_decode(file_get_contents("http://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json"));
        // dd($permission);
        return view('perdin.update', [
            'data' => $permission,
            'cities' => $this->getData
        ]);
    }

    public function updateStore(Request $request, Permission $permission){

        
        $this->getCity = json_decode(file_get_contents("https://emsifa.github.io/api-wilayah-indonesia/api/regency/$request->city.json"));
        
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'leaveTime' => 'required',
            'arriveTime' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'city.required' => 'Kota harus dipilih',
            'leaveTime.required' => 'Tanggal Keberangkatan Harus diisi',
            'arriveTime.required' => 'Tanggal Tiba harus diisi',
            'status.required' => 'Status belum ditentukan',
            'keterangan.required' => 'Keterangan belum diberikan'
        ]);

        $validatedData['city'] = $this->getCity->name;

        $permission->update([
            'name' => $validatedData['name'],
            'city' => $validatedData['city'],
            'leaveTime' => $validatedData['leaveTime'],
            'arriveTime' => $validatedData['arriveTime'],
            'status' => $validatedData['status'],
            'keterangan' => $validatedData['keterangan']
        ]);

        return redirect('/perdin')->with('update','Berhasil');
    }

    public function destroy(Permission $permission){

        $permission->delete();

        return redirect('/perdin')->with('delSuccess','Berhasil');
    }
}
