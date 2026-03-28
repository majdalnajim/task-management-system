<div>
    @if (session("success"))
<p style="color:green;">
    {{session("success")}}
</p>
@endif
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
     <form method="POST"action="/tasks/{{$task->id}}">
        @csrf
        @method("DELETE")
        <button type="submit">delete</button>
     </form>
     
    <a href="/tasks/{{$task->id}}/editخ" style="color:#212121;"> update task</a>
</li>
    @endforeach
</ul>
</div>
