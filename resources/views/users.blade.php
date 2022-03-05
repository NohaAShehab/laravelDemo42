{{--<?php--}}
{{--    $users = [["id"=>1, "name"=>"Noha"], ["id"=>2, "name"=>"Mname"]]--}}
{{--    ?>--}}

@foreach($users as $user)
    <p> {{$user["id"]}}  {{$user["name"]}}</p>

@endforeach
