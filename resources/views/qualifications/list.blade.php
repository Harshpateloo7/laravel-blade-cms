@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Qualification</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>College name</th>
            <th>Program name</th>
            <th>Url</th>
            <th>Location</th>
            <th>Started Date</th>
            <th>Ended Date</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($qualifications as $qualification): ?>
            <tr>
                <td>{{$qualification->college_name}}</td>
                <td>{{$qualification->program_name}}</td>
                <td>{{$qualification->url}}</td>
                <td>{{$qualification->location}}</td>
                <td>{{\Carbon\Carbon::parse($qualification->started_at)->format('d/m/Y')}}</td>
                <td>{{\Carbon\Carbon::parse($qualification->ended_at)->format('d/m/Y')}}</td>
              
                <td><a href="/console/qualifications/edit/{{$qualification->id}}">Edit</a></td>
                <td><a href="/console/qualifications/delete/{{$qualification->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/qualifications/add" class="w3-button w3-green">New qualification</a>

</section>

@endsection