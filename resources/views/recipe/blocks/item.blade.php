<tr>
    <th>{{ $model->name }}</th>
    <th>{{ $model->category->name }}</th>
    <th>
        <a
            class="btn btn-sm btn-primary"
            href="{{route('recipe.edit', $model)}}"
            title="Редактировать"
        >
            <i class="fas fa-edit"></i>
        </a>
    </th>
</tr>
