<tr>
    <th>{{ $model->name }}</th>
    <th>{{ $model->category->name }}</th>
    <th>
        <a
            class="btn btn-sm btn-outline-primary"
            href="{{route('recipe.show', $model)}}"
            title="Просмотр"
        >
            <i class="fas fa-eye"></i>
        </a>
        <a
            class="btn btn-sm btn-primary"
            href="{{route('recipe.edit', $model)}}"
            title="Редактировать"
        >
            <i class="fas fa-edit"></i>
        </a>
    </th>
</tr>
