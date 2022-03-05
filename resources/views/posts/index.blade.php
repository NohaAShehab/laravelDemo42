@extends("layouts.app")
@section("maincontent")
        <div class="text-center">
            <button class="btn btn-success"> New Post </button>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Desc</th>
                <th scope="col">User id</th>
                <th scope="col">View</th>
            </tr>
            </thead>
            <tbody>
{{--            @dump($posts)--}}
            @foreach($posts as $post)
            <tr>
                <th scope="row"> {{$post["id"]}}</th>
                <td>{{$post["title"]}}</td>
                <td>{{$post["description"]}}</td>
                <td>{{$post["user_id"]}}</td>
                <td><a class="btn btn-info" href="/posts/{{$post["id"]}}"> View </a></td>
            </tr>
            @endforeach

            </tbody>
        </table>
@endsection
