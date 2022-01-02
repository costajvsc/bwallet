<div class="mt-2 mb-4">
    <hr>
</div>
<h6 class="mt-2 mb-4"><i class="fas fa-file-invoice-dollar"></i> Transactions</h6>
<table class="table table-content-beetween text-center">
    <thead>
        <tr>
            <th scope="col" class="text-start">#</th>
            <th scope="col">Transaction</th>
            <th scope="col">Amount</th>
            <th scope="col">Accounting entry</th>
            <th scope="col">Occurrence at</th>
            <th scope="col" class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $t)
            <tr>
                <th scope="row" class="text-start">{{$t->id_transaction}}</th>
                <td>{{$t->transaction}}</td>
                <td>R$ {{$t->amount}}</td>
                <td>{{$t->accounting_entry == 1 ? 'Credit' : 'Debit'}}</td>
                <td>{{date_format(new DateTime($t->occurrence_at), 'd M Y')}}</td>
                <td class="text-end">
                    <a href="/transaction/edit/{{$t->id_transaction}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <a href="/transaction/delete/{{$t->id_transaction}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {{ $transactions->links() }}
</div>
