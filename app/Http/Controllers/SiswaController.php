<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Imports\SiswasImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::get();
        return view('siswa.index', compact('data'));
    }


    public function import_excel(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new SiswasImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);
        return redirect()->back();
    }

    public function delete()
    {
        // $data = Siswa::all();
        // // dd($data);
        // $data->delete();
        DB::table('siswas')->delete();
        return redirect('/');
    }
}
