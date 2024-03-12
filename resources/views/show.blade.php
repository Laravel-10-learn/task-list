@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}"
           class="link"><- Go back to the tasks list!</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 test-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} ・ Updated {{ $task->updated_at->diffForHumans() }}</p>
    <p class="mb-4">
        <span class="font-medium {{ $task->completed ? 'text-green-500' : 'text-red-500' }}">
            {{ $task->completed ? 'Completed' : 'Not completed'}}
        </span>
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
        class="btn">Edit</a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type = "submit" class="btn">Mark as {{$task->completed ? 'not completed' : 'completed'}}</button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type = "submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
