<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Customer</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Creation date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $key => $customer)
        <tr>
            <td style="height: 100px; width: 20px">{{ $customer->id}}</td>
            <td style="height: 100px; width: 20px">{{ $customer->first_name}} {{ $customer->last_name}}</td>
            <td style="height: 100px; width: 20px">{{ $customer->email}}</td>
            <td style="height: 100px; width: 20px">{{ $customer->indian_number}}</td>
            <td style="height: 100px; width: 20px">{{ $customer->created_at->format('d/m/Y') }}</td>

        </tr>
    @endforeach
    </tbody>
</table>


