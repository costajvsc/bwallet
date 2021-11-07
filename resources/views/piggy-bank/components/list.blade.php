<h5>Piggies Banks</h5>
<table class="table table-content-beetween">
    <thead>
        <tr>
            <th scope="col" class="text-start">#</th>
            <th scope="col">Title</th>
            <th scope="col">Milestone</th>
            <th scope="col">Amount</th>
            <th scope="col">Icon</th>
            <th scope="col" class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($piggies_bank as $p)
            <tr>
                <th scope="row" class="text-start">{{ $p->id_piggy_bank }}</th>
                <td>{{ $p->title }}</td>
                <td>{{date_format(new DateTime($p->milestone), 'd/m/Y')}}</td>
                <td>R$ {{ $p->amount }}</td>
                <td>
                    <i class="fas fa-{{$p->icon}}" style="color: {{$p->color}}; font-size: 1.5em"></i>
                </td>
                <td class="text-end">
                    <a href="/piggy-bank/edit/{{$p->id_piggy_bank}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <a href="/piggy-bank/delete/{{$p->id_piggy_bank}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>