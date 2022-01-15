@extends('layouts.app')

@section('content')

<h1>Classic editor</h1>
<form action="{{route('testF')}} " method="post">
    @csrf
    <textarea name="content" id="editor">
            &lt;p&gt;This is some sample content.&lt;/p&gt;
        </textarea>
    <p><input type="submit" value="Submit"></p>
</form>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
