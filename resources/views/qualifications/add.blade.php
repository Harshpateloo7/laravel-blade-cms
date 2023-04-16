@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Qualification</h2>

    <form method="post" action="/console/qualifications/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="college_name">College Name</label>
            <input type="text" name="college_name" id="college_name" value="{{old('college_name')}}" required>
            
            @if ($errors->first('college_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('college_name')}}</span>
            @endif
        </div>
        
        <div class="w3-margin-bottom">
            <label for="program_name">Program Name</label>
            <input type="text" name="program_name" id="program_name" value="{{old('program_name')}}" required>
            
            @if ($errors->first('program_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('program_name')}}</span>
            @endif
        </div>
          
        <div class="w3-margin-bottom">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="{{old('location')}}" required>
            
            @if ($errors->first('location'))
                <br>
                <span class="w3-text-red">{{$errors->first('location')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="url">URL:</label>
            <input type="url" name="url" id="url" value="{{old('url')}}">

            @if ($errors->first('url'))
                <br>
                <span class="w3-text-red">{{$errors->first('url')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="started_at">Started at:</label>
            <input type="date" name="started_at" id="started_at" value="{{old('started_at')}}">

            @if ($errors->first('started_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('started_at')}}</span>
            @endif
        </div>
        <div class="w3-margin-bottom">
            <label for="ended_at">Ended at:</label>
            <input type="date" name="ended_at" id="ended_at" value="{{old('ended_at')}}">

            @if ($errors->first('ended_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('ended_at')}}</span>
            @endif
        </div>
        
        <button type="submit" class="w3-button w3-green">Add Qualification</button>

    </form>

    <a href="/console/qualifications/list">Back to Qualification List</a>

</section>

@endsection