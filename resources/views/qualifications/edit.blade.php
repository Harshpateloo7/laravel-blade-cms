@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Qualification</h2>

    <form method="post" action="/console/qualifications/edit/{{$qualification->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="college_name">College Name:</label>
            <input type="text" name="college_name" id="college_name" value="{{old('college_name', $qualification->college_name)}}" required>
            
            @if ($errors->first('college_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('college_name')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="program_name">Program Name:</label>
            <input type="text" name="program_name" id="program_name" value="{{old('program_name', $qualification->program_name)}}" required>
            
            @if ($errors->first('program_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('program_name')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="location">location:</label>
            <input type="text" name="location" id="location" value="{{old('location', $qualification->location)}}" required>
            
            @if ($errors->first('location'))
                <br>
                <span class="w3-text-red">{{$errors->first('location')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="url">URL:</label>
            <input type="url" name="url" id="url" value="{{old('url', $qualification->url)}}">

            @if ($errors->first('url'))
                <br>
                <span class="w3-text-red">{{$errors->first('url')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="started_at"> started at:</label>
            <input type="date" name="started_at" id="started_at"
                value="{{old('started_at', \Carbon\Carbon::parse($qualification->started_at)->format('Y-m-d'))}}" required>

            @if ($errors->first('started_at'))
            <br>
            <span class="w3-text-red">{{$errors->first('started_at')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="ended_at"> ended_at:</label>
            <input type="date" name="ended_at" id="ended_at"
                value="{{old('ended_at', \Carbon\Carbon::parse($qualification->ended_at)->format('Y-m-d'))}}" required>

            @if ($errors->first('ended_at'))
            <br>
            <span class="w3-text-red">{{$errors->first('ended_at')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Qualification</button>

    </form>

    <a href="/console/qualification/list">Back to Qualification List</a>

</section>

@endsection
