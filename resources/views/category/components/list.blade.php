<h5>Categories</h5>
<table class="table table-content-beetween">
    <thead>
        <tr>
            <th scope="col" class="text-start">#</th>
            <th scope="col">Title</th>
            <th scope="col">Color</th>
            <th scope="col">Icon</th>
            <th scope="col">Demo</th>
            <th scope="col" class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $c)
            <tr>
                <th scope="row" class="text-start">{{$c->id_category}}</th>
                <td>{{$c->title}}</td>
                <td>{{$c->color}}</td>
                <td>{{$c->icon}}</td>
                <td>
                    <i class="fas fa-{{$c->icon}}" style="color: {{$c->color}}; font-size: 1.5em"></i>
                </td>
                <td class="text-end">
                    <a href="/category/edit/{{$c->id_category}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <a href="/category/delete/{{$c->id_category}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>