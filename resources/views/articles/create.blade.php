@extends('default')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Creer votre article !</p>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
          @endif
        <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
            @csrf
          <div class="control-group">
            <div class="form-group ">
              <label>titre</label>
              <input type="text" class="form-control" name="title"  value="{{old('title')}}">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group ">
              <label>Sous titre</label>
              <textarea rows="2" class="form-control" name="sub_title" >{{old('sub_title')}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="control-group">
            <div class="form-group ">
              <label>Date de publication</label>
              <input type="date" class="form-control" name="published_at" value="{{old('published_at')}}" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group ">
              <label>Text</label>
              <textarea rows="5" class="form-control" name="body" >{{old('body')}}</textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group ">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image" id="image" >
                <small id="fileHelpId" class="form-text text-muted">Help text</small>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
