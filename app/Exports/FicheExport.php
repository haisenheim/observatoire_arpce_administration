<?php

namespace App\Exports;

use App\Helpers\Colors;
use App\Models\Fiche;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
//use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FicheExport implements FromView,ShouldAutoSize, WithStyles, WithTitle
{


    protected $fiche;
    protected $colors;

    public function __construct($fiche)
    {
        $this->fiche = $fiche;
        $this->colors = Colors::getColors();
    }

    public function styles(Worksheet $sheet)
    {
       /* if($this->fiche->type_id==3){
            $sheet->getStyle('A1:F1')
            ->getFill()
            ->applyFromArray(
                [
                    'fillType' => 'solid','rotation' => 0,
                    'color' => ['rgb' => $this->colors['green']],
                    'font'=>['bold'=>true, 'size'=>28],
                ]
            );
            $sheet->getStyle('A8:F8')
            ->getFill()
            ->applyFromArray(
                [
                    'fillType' => 'solid',
                    'rotation' => 0,
                    'color' => ['rgb' => $this->colors['yellow']],
                ]
            );
            $rows[1] = [
                'font' => ['bold' => true, 'size'=>28],
                'color' => ['rgb' => $this->colors['black']],
            ];
            $rows[8] = [
                'font' => ['bold' => true, 'size'=>18],
                'color' => ['rgb' => $this->colors['black']],
            ];
            $rows[2] = ['font'=>['bold'=>true, 'size'=>18]];
             return $rows;
        } */
       /*  $sheet->getStyle('C1')
        ->getFill()
        ->applyFromArray(
            [
                'fillType' => 'solid','rotation' => 0,
                'color' => ['rgb' => $this->colors['orange']],
                'font'=>['bold'=>true, 'size'=>28],
                'alignment'=>'center'
            ]
        );
        $sheet->getStyle('C1')
         ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->getStyle(3)->getFont()->setColor(new Color($this->colors['black']));

         foreach($this->bold as $b){
            $prev = $b-1;
            $sheet->getStyle('A'.$b.':I'.$b)
                    ->getFill()
                ->applyFromArray(
                    [
                        'fillType' => 'solid','rotation' => 0,
                        'color' => ['rgb' => $this->colors['yellow']],
                    ]
                );
                $rows['A'.$b.':I'.$b] = ['font'=>['bold'=>true, 'size'=>15]];
            if(in_array($prev,$this->bold)){
                $sheet->getStyle('A'.$prev.':I'.$prev)
                    ->getFill()
                ->applyFromArray(
                    [
                        'fillType' => 'solid','rotation' => 0,
                        'color' => ['rgb' => $this->colors['orange']],
                    ]
                );
                $rows['A'.$prev.':I'.$prev] = ['font'=>['bold'=>true, 'size'=>18]];
            }


        }
        $rows[3] = [
            'font' => ['bold' => true, 'size'=>18],
            'color' => ['rgb' => $this->colors['black']],
        ];
        $rows['C1'] = ['font'=>['bold'=>true, 'size'=>28]];
         return $rows; */
    }

    public function title(): string
    {
        return $this->fiche->entreprise->name."  ".$this->fiche->annee;
    }

    public function view(): View
    {
        $fiche = $this->fiche;
        if($this->fiche->type_id == 1){
            return view('/Admin/Fiches/Export/show')->with(compact('fiche'));
        }
        if($this->fiche->type_id == 2){
            return view('/Admin/Fiches/Export/show_2')->with(compact('fiche'));
        }
        if($this->fiche->type_id == 3){
            return view('/Admin/Fiches/Export/show')->with(compact('fiche'));;
        }
    }
}
