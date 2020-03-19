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
        <form method="POST" action="{{route('articles.store')}}">
            @csrf
          <div class="control-group">
            <div class="form-group ">
              <label>titre</label>
              <input type="text" class="form-control" name="title"   >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group ">
              <label>Sous titre</label>
              <textarea rows="2" class="form-control" name="sub_title" ></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="control-group">
            <div class="form-group ">
              <label>Date de  publication</label>
              <input type="date" class="form-control" name="published_at"   >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group ">
              <label>text</label>
              <textarea rows="5" class="form-control" name="body" ></textarea>
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
