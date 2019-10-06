<?php

namespace App\Exports;
use Excel;
use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AccountsExport implements FromCollection,  WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Account::all();
    }

    public function map($account): array
    {
        return [
            $account->username,
            $account->email,
            $account->hasRole,
            $account->active,
        ];
    }

    public function headings(): array
    {
        return [
            'Username',
            'Email',
            'Role',
            'Active',
        ];
    }
}
