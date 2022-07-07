<x-app-layout title="{{ $yearMonthFrom }}/{{ $yearMonthTo }} Summary">

    <div class="container">

        <x-form action="{{ route('report.summary') }}" method="get" class="row">

            <div class="col">
                <x-input name="from" :value="$yearMonthFrom">Date Range From (yyyy-mm)</x-input>
            </div>
            <div class="col">
                <x-input name="to" :value="$yearMonthTo">Date Range To (yyyy-mm)</x-input>
            </div>
            <div class="col d-flex pb-3">
                <button class="btn btn-primary mt-auto">Update</button>
            </div>

        </x-form>

        <div class="card mb-5">

            <table class="table table-bordered table-hover mb-0">
                <thead>
                <tr>
                    <th width="40%">Category</th>
                    <th width="15%" class="text-end">Count</th>
                    <th width="15%" class="text-end">In</th>
                    <th width="15%" class="text-end">Out</th>
                    <th width="15%" class="text-end">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->category_name }}</td>
                        <td class="text-end">{{ $result->transaction_count }}</td>
                        <td class="text-end">{{ money($result->income) }}</td>
                        <td class="text-end">{{ money($result->outcome) }}</td>
                        <td class="text-end">{{ money($result->value) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="fw-bold">
                    <td>Totals</td>
                    <td class="text-end">{{ $totals['transaction_count'] }}</td>
                    <td class="text-end">{{ money($totals['income']) }}</td>
                    <td class="text-end">{{ money($totals['outcome']) }}</td>
                    <td class="text-end">{{ money($totals['value']) }}</td>
                </tr>
                </tfoot>
            </table>


        </div>

    </div>
</x-app-layout>
