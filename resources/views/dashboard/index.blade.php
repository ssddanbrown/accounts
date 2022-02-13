<x-app-layout title="Dashboard">

    <div class="container">

        <h2 class="fs-6">Recent Entries</h2>

        <div class="card">
            <table class="table table-bordered table-hover mb-0">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction ID</th>
                    <th>Payee/Payer</th>
                    <th>Amount</th>
                    <th>VAT Paid</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2022-01-01</td>
                    <td>do-1245</td>
                    <td>Digital Ocean</td>
                    <td class="text-danger">-£20.00</td>
                    <td>£2.00</td>
                    <td><a href="#">Edit</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
