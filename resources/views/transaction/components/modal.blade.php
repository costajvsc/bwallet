<div class="modal fade" id="create-transaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/transaction" method="POST">
            @csrf
                <div class="modal-body">
                <div class="mb-3">
                        <label for="transaction" class="form-label">Transaction</label>
                        <input type="text" class="form-control" id="transaction" name="transaction" minlength="3" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" min="0.01" maxlength="999999.99" step=".01" required>
                    </div>

                    <div class="mb-3">
                        <label for="occurrence_at" class="form-label">Date</label>
                        <input type="datetime-local" class="form-control" id="occurrence_at" name="occurrence_at" minlength="3" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="accounting_entry" class="form-label">Accounting entry</label>
                        <select class="form-select" id="accounting_entry" name="accounting_entry" required>
                            <option value="1">Credit (↓)</option>
                            <option value="-1">Debit (↑)</option>
                        </select>
                    </div>
                    <hr/>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="id_category">
                            <option value="0" selected>Selecionar...</option>
                            @foreach(\App\Services\LoadDataService::getCategories() as $c)
                                <option value="{{$c->id_category}}">{{$c->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment</label>
                        <select class="form-select" id="payment" name="id_payment">
                            <option value="0" selected>Selecionar...</option>
                            @foreach(\App\Services\LoadDataService::getPayments() as $p)
                                <option value="{{$p->id_payment}}">{{$p->bank}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="piggy_bank" class="form-label">Piggy bank</label>
                        <select class="form-select" id="piggy_bank" name="id_piggy_bank">
                            <option value="0" selected>Selecionar...</option>
                            @foreach(\App\Services\LoadDataService::getPiggiesBank() as $p)
                                <option value="{{$p->id_piggy_bank}}">{{$p->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-cash-register"></i> Create transction</button>
                </div>
            </form>
        </div>
    </div>
</div>
