@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">Edit Note</h1>
            <a class="btn btn-success" href="{{route('notes')}}"> all Notes</a>
           </div>
      </div>

    </div>
    <div class="row">

        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
        @endif


      <div class="col">
      <form action="{{route('note.update',['id'=> $note->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Title  </label>
            <input type="text" name="title" value="{{$note->title}}"  class="form-control"   >
            </div>

            <div class="form-group">
                @foreach ($tags as $item)
                <input type="checkbox" name="tags[]"
                   value="{{$item->id}}"

                   @foreach ($note->tag as $item2)
                       @if ($item->id == $item2->id)
                           checked
                       @endif
                   @endforeach

                   >

                   <label for="">{{$item->tag}}</label>
                @endforeach

              </div>


            <div class="form-group">
              <label for="exampleFormControlTextarea1">content  </label>
              <textarea class="form-control"   name="content"   rows="3"> {{$note->content}} </textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Photo  </label>
                <input type="file"  name="photo" class="form-control"   >
              </div>

            <div class="form-group">

                <button class="btn btn-danger" type="submit">update</button>
            </div>

          </form>
      </div>
    </div>
  </div>
@endsection


