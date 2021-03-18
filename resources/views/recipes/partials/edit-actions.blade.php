<!-- actions -->
@can('update', $recipe)
    <a href="{{ route('recipes.edit', $recipe->id) }}"
       class="btn btn-secondary">
        Edit
    </a>

    <form class="d-inline"
          action="{{route('recipes.destroy', $recipe->id)}}"
          method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endcan
