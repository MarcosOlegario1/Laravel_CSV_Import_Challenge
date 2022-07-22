<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomersImportController extends Controller
{
    public function show()
    {
        return view('customers.import');
    }
    public function store (Request $request)
    {
        $file = $request->file('file')->store('data');

        (new CustomersImport)->import($file);

        return back()->withStatus('Arquivo Importado com sucesso!');
    }
}
