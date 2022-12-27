<?php

namespace App\Http\Controllers\Modules\UISteeringDocument;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleSteeringDocument;

class UISteeringDocumentController extends Controller {

    public function tab(){
        return ModuleSteeringDocument::orderBy('date_effect','desc')->get();
    }
    public function list(){
        $documents = ModuleSteeringDocument::orderBy('id', 'desc')->get();
        $table = "";
        $count = count($documents);
        $row = 0;
        if($count > 0){
            foreach ($documents as $document) {
                $row+=1;
                $table .="<tr>";
                $table .="<td>".$document->field->name."</td>";
                $table .="<td>".$document->type->name."</td>";
                $table .="<td>".$document->organization->name."</td>";
                $table .="<td>$row</td>";
                $table .="<td>$document->number</td>";
                $table .="<td>".date('d/m/Y', strtotime($document->date_effect))."</td>";
                $table .="<td style='text-align: justify;'>";
                $table .= "<a href='".route('detailSteeringDocument', $document->id)."'>$document->content</a>";
                $table .= "</td>";
                $table .= "<td>
                                <a target='_blank' href='". $document->file_path ."'>
                                    <i class='fa fa-paperclip'></i>
                                </a>
                           </td>";
                $table .= "</tr>";
            }
        }
        return $table;
    }
    public function detail($id){
        return ModuleSteeringDocument::where('id', $id)->first();
    }
}
