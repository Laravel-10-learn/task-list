<h1>
    The task lists.
</h1>

<div>
    @if(count($tasks))
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th>
                <th>long description</th>

                <th>completed</th>
                <th>created at</th>
                <th>updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th>{{$task->id}}</th>
                    <th>{{$task->title}}</th>
                    <th>{{$task->description}}</th>
                    <th>{{$task->long_description}}</th>
                    <th>{{$task->completed}}</th>
                    <th>{{$task->created_at}}</th>
                    <th>{{$task->updated_at}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <div>
            There are no tasks!
        </div>
    @endif
</div>

