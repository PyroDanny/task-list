@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    {{-- @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No tasks found</p>
    @endif --}}
    @forelse ($tasks as $task)
    <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{$task->title}}</a>
    </div>
    @empty
        <p>"No tasks found"</p>;
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
</body>
</html>