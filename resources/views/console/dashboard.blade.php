@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <ul id="dashboard">
        <li><a href="/console/projects/list">Manage Projects</a></li>
        <li><a href="/console/types/list">Manage Types</a></li>
        <li><a href="/console/users/list">Manage Users</a></li>
        <li><a href="/console/entries/list">Manage Journal Entries</a></li>
        <li><a href="/console/topics/list">Manage Topics</a></li>
        <li><a href="/console/skills/list">Manage Skills</li>
        <li><a href="/console/certificates/list">Manage Certificates</li>
        <li><a href="/console/qualifications/list">Manage Qualification</li>
        <li><a href="/console/experiences/list">Manage Experience</li>
        <li><a href="/console/logout">Log Out</a></li>
    </ul>

</section>

@endsection
