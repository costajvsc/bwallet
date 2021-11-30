<h5>Payaments</h5>
<table class="table table-content-beetween">
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
                <td>{{date_format(new DateTime($t->occurrence_at), 'd/m/Y')}}</td>
                <td class="text-end">
                    <a href="/transaction/edit/{{$t->id_transaction}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                    <a href="/transaction/delete/{{$t->id_transaction}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>