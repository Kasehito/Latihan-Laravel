<x-layout>
    <x-slot:title>
        {{$title}}
        </x-slot>
        <h1>Halaman Student</h1>



        <table class="styled-table" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Departemen</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->grade->name}}</td>
                    <td>{{ $value->department->name}}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tambah CSS for button styling -->
        <style>
            .btn-custom {
                background-color: #007bff;
                /* Background biru */
                color: white;
                /* Warna font putih */
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                font-size: 16px;
                cursor: pointer;
                display: inline-block;
            }

            .btn-custom:hover {
                background-color: #0056b3;
                /* Biru lebih gelap saat hover */
            }

            .styled-table {
                width: 100%;
                border-collapse: collapse;
            }

            .styled-table th,
            .styled-table td {
                border: 3px solid black;
                /* Garis tebal */
                padding: 8px 12px;
                text-align: left;
            }

            .styled-table th {
                background-color: #f2f2f2;
            }

            .styled-table tr:nth-child(even) {
                background-color: #f9f9f9;
            }
        </style>
</x-layout>