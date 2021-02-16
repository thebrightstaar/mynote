<?php

namespace App\Http\Controllers\Web;

use App\Models\Notes;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Routing\Controller;



class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()

    {  $id = Auth::id();

        $notes = Notes::where('user_id' , $id)->orderBy('prioity' ,'DESC')->get();
       
        return view('notes.index')->with('notes',$notes);
    }


    public function create()
    {

       return view('notes.create');
    } 

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required',
            
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/notes',$newPhoto);

        $note = Notes::create([
            'user_id'  =>  Auth::id(),
            'title'    =>  $request->title,
            'content'  =>  $request->content,
            'photo'    =>  'uploads/notes/'.$newPhoto,
            
         ]);  
                return redirect()->back() ;

    }

    
    public function show( $id)
    {
        //
        $note = Notes::where('id' , $id )->first();
        return view('notes.show')->with('note',$note);
    }

    
    public function edit($id)
    {
        //
        $note = Notes::find( $id );
        return view('notes.edit')->with('note',$note);
    }
    

    
    public function update(Request $request,  $id )
    {
        //
        
        $note = Notes::find( $id ) ;
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required',
            'prioity' =>'required'
        ]);

     

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/notes',$newPhoto);
        $note->photo ='uploads/notes/'.$newPhoto ;
    }
    $note->title = $request->title;
    $note->content = $request->content;
    $note->save();
    
    return redirect()->back()->with('success','note updated successfully')   ;


   } 

    public function destroy($id)
    {
        //
        $note = Notes::find( $id ) ;
        $note->delete($id);
        return redirect()->back()->with('success','note deleted successfully')  ;
 
    }

    


}