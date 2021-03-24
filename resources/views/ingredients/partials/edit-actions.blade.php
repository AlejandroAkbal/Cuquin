<!-- actions -->
@can('update', $ingredient)
    <a href="{{ route('ingredients.edit', $ingredient->id) }}"
       class="btn btn-secondary">
        Edit
    </a>

    <form class="d-inline"
          action="{{route('ingredients.destroy', $ingredient->id)}}"
          method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endcan
