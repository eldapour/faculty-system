<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller {


    public function index(Request $request){

        if ($request->ajax()) {
            $documents = Document::query()
                ->where('user_id','=',Auth::id())
                ->get();

            return Datatables::of($documents)
                ->addColumn('action', function ($documents) {

                    if($documents->processing_request_date === null){
                        return '

                             <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' .  $documents->id . '" data-title="' .  $documents->document_type->getTranslation('document_name', app()->getLocale()) . '">
                                    <i class="fas fa-trash"></i>
                                '.trans("admin.delete").'

                            </button>
                       ';
                    }else{

                        return '

                             <button disabled class="btn btn-pill btn-danger-light" data-toggle="modal">
                                    <i class="fas fa-trash"></i>
                                '.trans("admin.delete").'

                            </button>
                       ';
                    }

                })
                ->editColumn('user_id', function ($documents) {

                    return $documents->user->first_name . ' ' . $documents->user->last_name;

                })
                ->editColumn('card_image', function ($documents) {

                    return '
                    <img alt="image" class="avatar avatar-md rounded-circle" src="' . asset("uploads/documents_card_images/".$documents->card_image)  .'">
                    ';

                })
                ->editColumn('identifier_id', function ($documents) {

                    return $documents->user->identifier_id;

                })
                ->editColumn('withdraw_by_proxy', function ($documents) {

                    if($documents->withdraw_by_proxy === 1){

                        return trans("admin.withdraw_by_proxy_yes");
                    }else{

                        return trans("admin.withdraw_by_proxy_no");
                    }

                })

                ->editColumn('request_status', function ($documents) {

                    if($documents->request_status == 'new'){

                        return trans("document.new");

                    }elseif ($documents->request_status == 'accept'){

                        return trans("document.accept");

                    } elseif ($documents->request_status == 'refused'){

                        return trans("document.refused");

                    }else{

                        return trans("document.under_processing");

                    }


                })
                ->editColumn('document_type_id', function ($documents) {

                    return $documents->document_type->getTranslation('document_name', app()->getLocale());

                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.documents.index');
        }

    }

    public function create()
    {
        $types = DocumentType::query()
            ->select('id','document_name')
            ->get();

        return view('student.documents.parts.create',compact('types'));
    }


    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'person_name' => 'nullable|string',
            'national_id_of_person' => 'nullable|max:16|required_with:person_name',
            'card_image' => 'nullable|mimes:jpeg,jpg,png,gif|required_with:person_name',
            'pull_type' => 'required|in:temporary,final',
            'pull_date' => 'nullable|date:Y-m-d',
            'pull_return' => 'nullable|date:Y-m-d',

        ]);

        if ($image = $request->file('card_image')) {

            $destinationPath = 'uploads/documents_card_images';
            $cardImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $cardImage);
            $request['card_image'] = "$cardImage";
        }


        $inputs = $request->all();
        $inputs['withdraw_by_proxy'] = $request->person_name != null ? true : false;
        $inputs['user_id'] = Auth::id();
        $inputs['card_image'] = $cardImage ?? null;
        $inputs['request_date'] = Carbon::now()->format('Y-m-d');


        if (Document::create($inputs)) {

            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $document = Document::query()
            ->where('id', $request->id)
            ->first();

        $document->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }

}
