<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentStoreRequest;
use App\Http\Requests\DocumentTypeStoreRequest;
use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DocumentTypeController extends Controller
{

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

    public function create()
    {
        return view('admin.document_types.parts.create');
    }

    public function store(DocumentTypeStoreRequest $request, DocumentType $document_type): \Illuminate\Http\JsonResponse
    {
        $inputs = $request->all();
        // dd();

        if ($document_type->create($inputs)) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(DocumentType $documentType)
    {
        return view('admin.document_types.parts.edit', compact('documentType'));
    }


    public function update(Request $request,DocumentType $documentType): \Illuminate\Http\JsonResponse
    {

        $request->validate([
            'document_name_ar' => 'required',
            'document_name_en' => 'required',
            'document_name_fr' => 'required',
        ]);
        $documentType->update([
            'document_name' => [
                'ar' => $request->document_name_ar,
                'en' => $request->document_name_en,
                'fr' => $request->document_name_fr
            ],

        ]);

        if ($documentType->save()) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function delete(Request $request)
    {
         $document_type = DocumentType::query()
        ->where('id', $request->id)
             ->firstOrFail();

         $document_type->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


}
