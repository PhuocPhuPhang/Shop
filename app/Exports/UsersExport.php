<?php

namespace App\Exports;

use App\User;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterExport;

class UsersExport implements FromQuery,WithHeadings,WithEvents
{

    public function registerEvents(): array
    {
        $style = ['font'=>['bold'=>true]];
        return [
            AfterExport::class => function(AfterExport $event) use ($style) {
                $event->sheet->getStyle('A1:E1')->applyFromStyle($style);
            },
        ];
    }
    public function query()
    {
        return User::select('ten','ngay_sinh','so_dien_thoai','email','dia_chi')->where('quyen',1);
    }

    public function headings(): array
    {
        return [
            'Họ tên',
            'Ngày sinh',
            'Số điện thoại',
            'Email',
            'Địa chỉ'
        ];
    }
}
