<div>
<form method="GET" action="add-task">
    <input type="text" name="title" placeholder="task title"/>
    <input type="text" name="description" placeholder="task descrption"/>
    <button type="submit">add</button>


</form>
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<h2>tasks:</h2>
<ul>
    @foreach($tasks as $task)
    <li>{{$task->title}} - {{$task->description}}</li>
    @endforeach
</ul>
</div>
