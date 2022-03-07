@extends("layouts.app")
@section("maincontent")
    <form class="form-control" action="{{route("posts.store")}}" method="post" >
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control" >
        </div>
        <div class="mb-3">
            <select class="form-select"   name="user_id" aria-label="Default select example">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>



    </form>
@endsection




