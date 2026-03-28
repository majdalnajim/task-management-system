<div>
<form method="POST" action="/tasks/{{$task->id}}">
    @csrf
    @method("PUT")
    <input type="text" name="title" value="{{$task->title}}"/>
    <input type="text" name="description" value="{{$task->description}}"/>
    <button type="submit">edit</button>


</form>

</div>
