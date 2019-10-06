<?php

namespace App\Http\Controllers;

use App\Account;
use App\Exports\AccountsExport;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportController extends Controller
{
    public function export(Request $request){
        $exportType = $request['exportType'];
        if ($exportType == 'accounts'){
            return Excel::download(new AccountsExport, 'abc.xlsx');
        }else{
            return 'hehe';
        }

    }
}
