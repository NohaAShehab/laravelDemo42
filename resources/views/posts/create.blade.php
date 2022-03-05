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
            <label  class="form-label">User</label>
            <input type="text" name="user_id" class="form-control" >
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>



    </form>
@endsection




