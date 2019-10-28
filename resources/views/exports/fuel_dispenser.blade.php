<table>
    <thead>
    <tr>
        <th>Dispenser Name</th>
        <th>Litre</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
        @foreach($fuels as $fuel)
            <tr>
                <td>{{ $fuel->dispenser->name }}</td>
                <td>{{ $fuel->litre }}</td>
                <td>{{ $fuel->transaction_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>