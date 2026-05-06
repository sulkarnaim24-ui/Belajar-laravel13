<x-app>


  <x-slot:title>{{ $title }}</x-slot>

  @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

  <a class="btn btn-primary mb-3" href="{{ route('Student.create') }}" role="button">Create</a>

    <ul class="list-group">
      @foreach ($students as $student )
        <li class="list-group-item">
          {{ $loop->iteration }}. {{ $student->nim }} -- {{ $student->name }}
        <a class="btn btn-warning btn-sm " href="{{ route('Student.edit', $student) }}"
          role="button">edit</a>
          <form action="{{ route('Student.destroy', $student) }}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf

              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')">Delete</button>
        </li>
      @endforeach
    </ul>

    
</x-app>