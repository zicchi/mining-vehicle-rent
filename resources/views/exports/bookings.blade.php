<table>
    <thead>
        <tr>
            <th colspan="4">
                Laporan Pemesanan
                Bulan: {{ $month ?? 'Semua Bulan' }},
                Tahun: {{ $year ?? 'Semua Tahun' }}
            </th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nama Kendaraan</th>
            <th>Status</th>
            <th>Driver</th>
            <th>Tanggal Pemesanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->vehicle->name }}</td>
                <td>{{ $booking->status }}</td>
                <td>{{ $booking->driver->name }}</td>
                <td>{{ $booking->booking_date }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
