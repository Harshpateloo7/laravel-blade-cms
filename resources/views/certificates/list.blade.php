@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Certificates</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Title</th>
            <th>url</th>
            <th>Date</th>
            <th>Image</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($certificates as $certificate): ?>
            <tr>
                <td>{{$certificate->title}}</td>
                <td>{{$certificate->url}}</td>
                <td>{{\Carbon\Carbon::parse($certificate->learned_at)->format('d/m/Y g:i A')}}</td>
                <td>
                    @if ($certificate->image)
                        <img src="{{asset('storage/'.$certificate->image)}}" width="200">
                    @endif
                </td>
                <td><a href="/console/certificates/image/{{$certificate->id}}">Image</a></td>
                <td><a href="/console/certificates/edit/{{$certificate->id}}">Edit</a></td>
                <td><a href="/console/certificates/delete/{{$certificate->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/certificates/add" class="w3-button w3-green">New certificate</a>

</section>

@endsection