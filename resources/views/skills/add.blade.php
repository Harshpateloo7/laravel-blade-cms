@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Skill</h2>

    <form method="post" action="/console/skills/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
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
        <button type="submit" class="w3-button w3-green">Add Skill</button>
    </form>

    <a href="/console/skills/list">Back to skill List</a>

</section>

@endsection