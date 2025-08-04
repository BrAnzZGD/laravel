<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Data Registrasi</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Telepon</th>
                        <th class="px-4 py-3 border">Nama Bisnis</th>
                        <th class="px-4 py-3 border">Alamat</th>
                        <th class="px-4 py-3 border">Waktu</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-sm text-gray-800">
                    @forelse($data as $item)
                        <tr class="text-center hover:bg-gray-50 transition duration-200">
                            <td class="px-4 py-2 border">{{ $item->name }}</td>
                            <td class="px-4 py-2 border">{{ $item->email }}</td>
                            <td class="px-4 py-2 border">{{ $item->telepon }}</td>
                            <td class="px-4 py-2 border">{{ $item->name_bisnis }}</td>
                            <td class="px-4 py-2 border">{{ $item->address }}</td>
                            <td class="px-4 py-2 border">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500 italic">
                                Belum ada data registrasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-center mt-8">
            <a href="{{ url('/register') }}"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Kembali ke Form
            </a>
        </div>
    </div>
</body>
</html>
