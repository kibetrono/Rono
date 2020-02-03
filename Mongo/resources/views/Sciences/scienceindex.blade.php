
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <style>
  .top{
    background:black;
   color:white;
    width:100%;
    position:fixed;
  }
  .btn{
float:right;
color:white;
  }
  </style>
  <body>
  <div class="top">
  
  <button class="btn" type="button"><a href="{{route('logout')}}">{{ __('Logout') }}</a></button>
  </div>
    
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Link</th>
        <th>Keywords</th>
        <th>Description</th>
        <th>Filename</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($cars as $car)
      <tr>
        <td>{{$car->id}}</td>
        <td>{{$car->site_title}}</td>
        <td>{{$car->site_link}}</td>
        <td>{{$car->site_keywords}}</td>
        <td>{{substr($car->site_description,0,50)}} ...</td>
        <td>{{$car->filename}}</td>
        <td><a href="{{url('editScience', $car->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
        <form action="{{url('deleteScience', $car->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  {{$cars->links()}}
  </body>
</html>