<?php

namespace App\Http\Controllers\API;

use App\Models\Notes;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Notes as NotesResource;


class NotesController extends BaseController
{
        public function index()
    { $id = Auth::id();

     $notes = Notes::where('user_id' , $id)->get();
    return $this->sendResponse(NotesResource::collection($notes), 'Notes retrieved Successfully!' );
    
    
    }

    
  
    
public function store(Request $request)
    {//لاضافة ملاحظة جديدة
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'   =>'required',
            'content' =>'required',
            

        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate Error',$validator->errors() );
        }

        $user = Auth::user();
        $input['user_id'] = $user->id;
        $note = Notes::create($input);
        return $this->sendResponse($note, 'Note added Successfully!' );

    }




    public function show($id)
    {
        //لارجاع معلومات ملاحظة واحدة معينة
         $note = Notes::find($id);
        if (is_null($note)) {
            return $this->sendError('Note not found!' );
        }
        return $this->sendResponse(new NotesResource($note), 'Note retireved Successfully!' );

    }

    
    public function update(Request $request, Notes $note)
    {
        //للتعديل على ملاحظة معينة

        $input = $request->all();
        $validator = Validator::make($input,[
            'title'   =>'required',
            'content' =>'required',
            'prioity' =>'required',
            
         ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error' , $validator->errors());
        }
        $note->title   = $input['title'];
        $note->content = $input['content'];
        $note->prioity = $input['prioity'];
        $note->save();

        return $this->sendResponse( new NotesResource($note), 'Note updated Successfully!' );

    }

    

    public function destroy(Notes $note)
    {
        //لحذف ملاحظة معينة

        $note->delete();
        return $this->sendResponse(new NotesResource($note), 'Note deleted Successfully!' );

    }
}
