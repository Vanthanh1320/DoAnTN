<?php

namespace App\Exports;

use App\Models\ApplyList;
use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ApplyExport implements WithHeadings,WithStyles,WithDrawings,
    WithCustomStartCell,WithColumnWidths,WithEvents,
    WithMapping,FromCollection,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function startCell(): string
    {
        return 'A3';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 35,
            'B' => 25,
            'C' => 25,
            'D' => 20,
            'E' => 35,
            'F' => 20,
            'G' => 18,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            3 => ['font' => ['bold' => true]],
            4  => ['font' => ['bold' => true]],
        ];;
    }

    public function headings():array {
        return [
            ['Danh sách các ứng viên ứng tuyển'],
            [
                'Tiêu đề',
                'Họ và tên',
                'Địa chỉ email',
                'Số điện thoại',
                'Link CV',
                'Ngày ứng tuyển',
                'Trạng thái'
            ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->getDelegate()->mergeCells('A3:G3');
                $event->sheet->getDelegate()->getStyle('A:G')->getFont()->setSize(12);
                $event->sheet->getDelegate()
                    ->getStyle('A3:E3')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('3')->getFont()->setSize(18);

            },
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('users/img/logo-white.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function collection()
    {
        $post=Recruitment::where('user_id',Auth::id())->get();

        $candidates=ApplyList::with('recruitment')->where(function ($query) use ($post){
            for ($i=0;$i< count($post);$i++){
                $query->orWhere('recruitment_id',$post[$i]->id);
            }

        })->get();

        return $candidates;
    }

    public function map($candidates): array
    {
        return [
            $candidates->recruitment->title,
            $candidates->name,
            $candidates->email,
            $candidates->phone_number,
            url('pdf-cv').'/'.$candidates->linkCV,
            $candidates->created_at,
            $candidates->status===0 ? 'Chưa duyệt':'Đã duyệt',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
