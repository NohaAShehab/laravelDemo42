@extends("layouts.app")
@section("maincontent")
    <form class="form-control" >
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">User</label>
            <input type="text" class="form-control" >
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>



    </form>
@endsection




