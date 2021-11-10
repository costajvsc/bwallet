<h5>Payaments</h5>
<table class="table table-content-beetween">
    <thead>
        <tr>
            <th scope="col" class="text-start">#</th>
            <th scope="col">Bank</th>
            <th scope="col">Credit</th>
            <th scope="col">Billing Day</th>
            <th scope="col" class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $p)
            <tr>
                <th scope="row" class="text-start">{{$p->id_payment}}</th>
                <td>{{$p->bank}}</td>
                <td>{{$p->is_credit ? 'True' : 'False'}}</td>
                <td>{{$p->billing_day}}</td>
                <td class="text-end">
                    <a href="/payment/edit/{{$p->id_payment}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <a href="/payment/delete/{{$p->id_payment}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>