@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Skills</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Title</th>
            <th>url</th>
            <th>Image</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($skills as $skill): ?>
            <tr>
                <td>{{$skill->title}}</td>
                <td>{{$skill->url}}</td> 
                <td>
                    @if ($skill->image)
                        <img src="{{asset('storage/'.$skill->image)}}" width="200">
                    @endif
                </td>
                <td><a href="/console/skills/image/{{$skill->id}}">Image</a></td>       
                <td><a href="/console/skills/edit/{{$skill->id}}">Edit</a></td>
                <td><a href="/console/skills/delete/{{$skill->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/skills/add" class="w3-button w3-green">New Entry</a>

</section>

@endsection