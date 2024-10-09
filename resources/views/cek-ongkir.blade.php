<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Ongkir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-8 max-w-lg bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-700">Cek Ongkir</h2>

        <form action="" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="origin" class="block text-sm font-medium text-gray-700">Asal Kota</label>
                <select name="origin" id="origin" required class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Kota Asal</option>
                    @foreach ($cities as $item)
                        <option value="{{$item['city_id']}}">{{$item['city_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="destination" class="block text-sm font-medium text-gray-700">Kota Tujuan</label>
                <select name="destination" id="destination" required class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Kota Tujuan</option>
                    @foreach ($cities as $item)
                        <option value="{{$item['city_id']}}">{{$item['city_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="weight" class="block text-sm font-medium text-gray-700">Berat Paket (gram)</label>
                <input type="number" name="weight" id="weight" required class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan berat paket">
            </div>
            <div>
                <label for="courier" class="block text-sm font-medium text-gray-700">Ekspedisi</label>
                <select name="courier" id="courier" required class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Ekspedisi</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                </select>
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Cek Ongkir
                </button>
            </div>
        </form>

        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Rincian Ongkir</h2>

            @foreach ($ongkir as $item)
                <div class="bg-gray-100 p-4 rounded-lg shadow-sm mb-4">
                    <h3 class="text-lg font-medium text-gray-800">{{$item['name']}}</h3>
                    @if ($item['costs'])
                        @foreach ($item['costs'] as $costs)
                            <div class="mt-2">
                                <span class="text-sm font-semibold text-gray-600">Layanan: </span>
                                <span class="text-sm text-gray-800">{{$costs['service']}}</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                {{$costs['description']}}
                            </div>
                            @foreach ($costs['cost'] as $cost)
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="text-sm text-gray-700">Harga:</span>
                                    <span class="text-sm font-semibold text-gray-900">Rp {{$cost['value']}}</span>
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        <div class="mt-2">
                            <span class="text-base font-bold text-gray-600">Layanan pengiriman tidak tersedia </span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
