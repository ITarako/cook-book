<tr>
    <th>{{ $model->name }}</th>
    <th>{{ count($model->recipes) }}</th>
    <th>
        <a
            class="btn btn-sm btn-primary"
            href="{{route('category.edit', $model)}}"
            title="Редактировать"
        >
            <i class="fas fa-edit"></i>
        </a>
    </th>
</tr>
