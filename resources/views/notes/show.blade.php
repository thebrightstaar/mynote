@extends('layouts.app')


@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="row">
        
      <div class="col">
        <div class="notes">
          <div class="rotate-1 lazur-bg">
                   <img src="{{URL::asset($notes->photo)}}" class="card-img-top" alt="{{$note->photo}}">
            
           <p> <small>$today</small></p>
            <p>  <h2>{{$note->title}}</h2></p>
            <p>  <h3>{{$note->prioity}}</h3></p>
              <p><h4> {{$note->content}}</h4></p>
            <p> Created at:   {{$note->created_at->diffForhumans() }}</p>
            <p>  Updated at:    {{$note->updated_at->diffForhumans() }}</p>


                @foreach ($tags as $item)

                   <label for="">{{$item->tag}}</label> -
                @endforeach

<br>

              <a class="btn btn-success" href="{{route('notes')}}"> all notes</a>
            </div>
          </div>

      </div>
    </div>
  </div>
@endsection


