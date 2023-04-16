@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Certificate</h2>

    <form method="post" action="/console/certificates/add" novalidate class="w3-margin-bottom">

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
        <div class="w3-margin-bottom">
            <label for="learned_at">Learned at:</label>
            <input type="date" name="learned_at" id="learned_at" value="{{old('learned_at')}}">

            @if ($errors->first('learned_at'))
                <br>
                <span class="w3-text-red">{{$errors->first('learned_at')}}</span>
            @endif
        </div>
        
        <button type="submit" class="w3-button w3-green">Add Certificate</button>

    </form>

    <a href="/console/certificates/list">Back to Certificate List</a>

</section>

@endsection