@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Experiences</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Job Title</th>
            <th>Company Name</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Description</th>
            <th>Link</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($experiences as $experience)
        <tr>
            <td>{{ $experience->job_title }}</td>
            <td>{{ $experience->company_name }}</td>
            <td>{{ $experience->location }}</td>
            <td>{{ \Carbon\Carbon::parse($experience->start_date)->format('d/m/Y g:i A') }}</td>
            <td>
                @if($experience->end_date)
                {{ \Carbon\Carbon::parse($experience->end_date)->format('d/m/Y g:i A') }}
                @else
                Present
                @endif
            </td>
            <td>{{ $experience->description }}</td>
            <td>{{ $experience->url }}</td>
            <td><a href="/console/experiences/edit/{{ $experience->id }}">Edit</a></td>
            <td><a href="/console/experiences/delete/{{ $experience->id }}">Delete</a></td>
        </tr>
        @endforeach
    </table>

    <a href="/console/experiences/add" class="w3-button w3-green">New Experience</a>

</section>

@endsection