@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Experience</h2>

    <form method="post" action="/console/experiences/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="job_title">Job Title:</label>
            <input type="text" name="job_title" id="job_title" value="{{old('job_title')}}" required>

            @if ($errors->first('job_title'))
            <br>
            <span class="w3-text-red">{{$errors->first('job_title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" id="company_name" value="{{old('company_name')}}" required>

            @if ($errors->first('company_name'))
            <br>
            <span class="w3-text-red">{{$errors->first('company_name')}}</span>
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
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{old('start_date')}}" required>

            @if ($errors->first('start_date'))
            <br>
            <span class="w3-text-red">{{$errors->first('start_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{old('end_date')}}" required>

            @if ($errors->first('end_date'))
            <br>
            <span class="w3-text-red">{{$errors->first('end_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="description">Description: </label>
            <input type="text" name="description" id="description" value="{{old('description')}}" required>

            @if ($errors->first('description'))
            <br>
            <span class="w3-text-red">{{$errors->first('description')}}</span>
            @endif
        </div>


        <div class="w3-margin-bottom">
            <label for="url">Link:</label>
            <input type="url" name="url" id="url" value="{{old('url')}}">

            @if ($errors->first('url'))
            <br>
            <span class="w3-text-red">{{$errors->first('url')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Experience</button>
    </form>

    <a href="/console/experiences/list">Back to Experience List</a>

</section>

@endsection
