@extends("layouts.app")
@section("maincontent")

        <div class="text-center">
            <a class="btn btn-success" href="{{route("posts.create")}}"> New Post </a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Desc</th>
                <th scope="col">User id</th>
                <th scope="col">View</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>

            </tr>
            </thead>
            <tbody>
{{--            @dump($posts)--}}
            @foreach($posts as $post)
            <tr>
{{--                @dd($post->user->name)--}}
                <th scope="row"> {{$post["id"]}}</th>
                <td>{{$post["title"]}}</td>
                <td>{{$post["description"]}}</td>
{{--                <td>{{$post["user_id"]}}</td>--}}
                <td> {{$post->user ? $post->user->name : "Default"}}</td>
{{--                <td> {{$post->postCreater->name }}</td>--}}
{{--                <td><a class="btn btn-info" href="/posts/{{$post["id"]}}"> View </a></td>--}}
                <td><a class="btn btn-info" href="{{route("posts.show",$post["id"])}}"> View </a></td>
                <td><a href="{{route("posts.edit",$post["id"])}}" class="btn btn-warning">Edit </a></td>
                <td>
                    <form action="{{route("posts.destroy",$post["id"])}}"  method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete"  class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {!! $posts->links() !!}
@endsection
