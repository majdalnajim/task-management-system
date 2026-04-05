<div>
    @if (session("success"))
<div style="background:lightgreen;padding:10px">
    {{session("success")}}
</div>
@endif
<form method="GET" action="{{route('tasks.index')}}">
    <input type="text" name="search" placeholder="search tasks..." value="{{$search}}"/>
    <button type="submit">Search</button>
    @csrf

</form>
<form method="POST" action="tasks">
    <input type="text" name="title" placeholder="task title"/>
    <input type="text" name="description" placeholder="task descrption"/>
    <button type="submit">add</button>
    @csrf

</form>
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<hr>
<h2>tasks:</h2>
<ul>
    @foreach($tasks as $task)
    <li>{{$task->title}} - {{$task->description}}
     <form method="POST" action="/tasks/{{$task->id}}">
        @csrf
        @method("DELETE")
        <button type="submit">delete</button>
     </form>
     
    <a href="/tasks/{{$task->id}}/edit" style="color:#212121;"> update task</a>
    <label>
        <input type="checkbox" name="is_complected" {{$task->is_complected==1 ?"checked":" "}}/>
        Completed
    </label>
</li>
    @endforeach
</ul>
{{$tasks->links()}}
</div>
