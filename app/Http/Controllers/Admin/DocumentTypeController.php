<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DocumentTypeController extends Controller
{
    // Index Start
    public function index(request $request)
    {
        if ($request->ajax()) {
            $document_types = DocumentType::query()
                ->get();

            return Datatables::of( $document_types)
                ->addColumn('action', function ( $document_types) {
                    return '
                            <button type="button"  data-id="' .  $document_types->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' .  $document_types->id . '" data-title="' .  $document_types->getTranslation('document_name', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('document_name', function ($document_types) {

                    return $document_types->getTranslation('document_name', app()->getLocale());

                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.document_types.index');
        }
    }
    // Index End

    // Create Start
    public function create()
    {
        return view('admin.document_types.parts.create');
    }
    // Create End

    // Store Start
    public function store(Request $request)
    {

        $request->validate([
            'document_name_ar' => 'required',
            'document_name_en' => 'required',
            'document_name_fr' => 'required',
        ]);

        $document_type = DocumentType::create([
            'document_name' => ['ar' => $request->document_name_ar,'en' => $request->document_name_en,'fr' => $request->document_name_fr],


        ]);
        if ($document_type->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Store End

    // Edit Start
    public function edit(DocumentType $documentType)
    {
        return view('admin.document_types.parts.edit', compact('documentType'));
    }
    // Edit End

    // Update Start

    public function update(Request $request,DocumentType $documentType)
    {

        $request->validate([
            'document_name_ar' => 'required',
            'document_name_en' => 'required',
            'document_name_fr' => 'required',
        ]);
        $documentType->update([
            'document_name' => ['ar' => $request->document_name_ar,'en' => $request->document_name_en,'fr' => $request->document_name_fr],


        ]);

        if ($documentType->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }

    // Edit End

    // Destroy Start

    public function destroy(Request $request)
    {
         $document_type = DocumentType::query()
        ->where('id', $request->id)
             ->firstOrFail();

         $document_type->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

    // Destroy End
}
