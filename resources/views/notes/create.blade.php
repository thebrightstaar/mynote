@extends('layouts.app')


@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="notes">
          <div class="notes">
        <div class="jumbotron">
            <h1 class="display-4">Create note</h1>
            <a class="btn btn-success" href="{{route('notes')}}"> all notes</a>
           </div>
      </div>

    </div>
    
    <div class="notes">
      @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
        @endif

<div class="notes">
      <form action="{{route('note.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    <div class="notes">
            
                <div class="rotate-1 lazur-bg">
                  @php  
                  $today=today();
                  @endphp
                    <small></small>
                   <label for="exampleFormControlInput1"><h4>Title</h4>  </label>
                 <input type="text" name="title" class="form-control"   >
                 <div><label for="exampleFormControlInput1"><h5>prioity</h5>  </label>
                 <input type="text" name="prioity" class="form-control"   ></div>
             <div class="form-group">
               
                <div class="form-group">
              <label for="exampleFormControlTextarea1">content  </label>
              <textarea class="form-control"  name="content"   rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Photo  </label>
                <input type="file"  name="photo" class="form-control"   >
              </div>

            <div class="form-group">

                <button class="btn btn-danger" type="submit">save</button>
            </div>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

@endsection


