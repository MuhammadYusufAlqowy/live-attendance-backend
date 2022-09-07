<form action="{{ url($delete_url) }}" method="post">
    @csrf @method('DELETE')
    @if ($edit_url && !$model->is_admin)
        <a href="{{ $edit_url }}" class="btn btn-sm btn-primary text-white">Edit</a>
    @endif
    <a href="{{ $show_url }}" class="btn btn-sm btn-info">Detail</a>
    @if ($delete_url && !$model->is_admin)
    <button
    type="submit"
    class="btn btn-danger btn-sm"
    onclick="return confirm('Are you sure want to delete this data ?')"
    >Delete</button>
    @endif
</form>