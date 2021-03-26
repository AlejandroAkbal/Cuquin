<!-- actions -->
@can('update', $ingredient)
    <a href="{{ route('ingredients.edit', $ingredient) }}"
       class="btn btn-secondary">
        Edit
    </a>

    <form class="d-inline"
          action="{{route('ingredients.destroy', $ingredient)}}"
          method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endcan
