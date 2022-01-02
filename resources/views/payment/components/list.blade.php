<div class="mt-2 mb-4">
    <hr>
</div>
<h6 class="mt-2 mb-4"><i class="far fa-credit-card"></i> Payments</h6>

<table class="table table-content-beetween text-center">
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
<div class="d-flex justify-content-end">
    {{ $payments->links() }}
</div>
