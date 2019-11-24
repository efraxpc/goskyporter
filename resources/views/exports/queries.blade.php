<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Query status</th>
        <th>Customer</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Query date</th>
        <th>Remarks</th>
    </tr>
    </thead>
    <tbody>
    @foreach($queries as $key => $query)
        <tr>
            <td style="height: 100px; width: 20px">{{ $query->id}}</td>
            <td style="height: 100px; width: 20px">{{ $query->query_status}}</td>
            <td style="height: 100px; width: 20px">{{ $query->first_name}} {{ $query->last_name}}</td>
            <td style="height: 100px; width: 20px">{{ $query->email}}</td>
            <td style="height: 100px; width: 20px">{{ $query->indian_number}}</td>
            <td style="height: 100px; width: 20px">{{ $query->query_date->format('d/m/Y')}}</td>

            <td style="height: 100px; width: 20px">
                @foreach ($unserializedRemarks[$key] as $remark)
                    <p>{{$remark}}</p>
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


