@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Entry Topics</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($topics as $topic): ?>
            <tr>
                <td>{{$topic->title}}</td>
                <td><a href="/console/topics/edit/{{$topic->id}}">Edit</a></td>
                <td><a href="/console/topics/delete/{{$topic->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/topics/add" class="w3-button w3-green">New Topic</a>

</section>

@endsection