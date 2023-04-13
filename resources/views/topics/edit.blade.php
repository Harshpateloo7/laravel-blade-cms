@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Topic</h2>

    <form method="post" action="/console/topics/edit/{{$topic->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title', $topic->title)}}" required>

            @if ($errors->first('title'))
            <br>
            <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>
        <button type="submit" class="w3-button w3-green">Edit Entry</button>

    </form>

    <a href="/console/topics/list">Back to Topic List</a>

</section>

@endsection
