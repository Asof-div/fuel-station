<table>
    <thead>
    <tr>
        <th>Tank Name</th>
        <th>Litre</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
        @foreach($fuels as $fuel)
            <tr>
                <td>{{ $fuel->tank->name }}</td>
                <td>{{ $fuel->litre }}</td>
                <td>{{ $fuel->transaction_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>