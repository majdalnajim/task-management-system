<div>
<form method="POST" action="/tasks/{{$task->id}}">
    @csrf
    @method("PUT")
    <input type="text" name="title" value="{{$task->title}}"/>
    <input type="text" name="description" value="{{$task->description}}"/>
    <label>
        <input type="checkbox" name="is_complected" {{$task->is_complected?"checked":" "}}/>
        Completed
    </label>
    <button type="submit">edit</button>


</form>

</div>
