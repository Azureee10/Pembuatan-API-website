<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/toko', function () {
    return view('toko.index');
})->middleware(['auth', 'verified'])->name('toko.index');

Route::get('/toko/{store}', function (string $store) {
    $stores = [
        'walmart' => ['id' => 'walmart', 'name' => 'Walmart', 'icon' => '🛒'],
        'amazon' => ['id' => 'amazon', 'name' => 'Amazon', 'icon' => '📦'],
        'diy' => ['id' => 'diy', 'name' => 'DIY', 'icon' => '🛠️'],
        'alibaba' => ['id' => 'alibaba', 'name' => 'Alibaba', 'icon' => '🌍'],
        'lainnya' => ['id' => 'lainnya', 'name' => 'Lainnya', 'icon' => '✨'],
        'jakarta' => ['id' => 'jakarta', 'name' => 'Jakarta Mart', 'icon' => '🏙️'],
        'bandung' => ['id' => 'bandung', 'name' => 'Bandung Pilihan', 'icon' => '🌼'],
        'surabaya' => ['id' => 'surabaya', 'name' => 'Surabaya Sejahtera', 'icon' => '🏪'],
        'yogyakarta' => ['id' => 'yogyakarta', 'name' => 'Jogja Warna', 'icon' => '🎨'],
        'bali' => ['id' => 'bali', 'name' => 'Bali Sejahtera', 'icon' => '🌴'],
        'medan' => ['id' => 'medan', 'name' => 'Medan Fresh', 'icon' => '🍊'],
        'makassar' => ['id' => 'makassar', 'name' => 'Makassar Hub', 'icon' => '⚓'],
        'semarang' => ['id' => 'semarang', 'name' => 'Semarang Jaya', 'icon' => '🏠'],
        'palembang' => ['id' => 'palembang', 'name' => 'Palembang Sentral', 'icon' => '🛍️'],
        'pekanbaru' => ['id' => 'pekanbaru', 'name' => 'Pekanbaru Store', 'icon' => '🌿'],
        'banjarmasin' => ['id' => 'banjarmasin', 'name' => 'Banjarmasin Mart', 'icon' => '🚤'],
        'balikpapan' => ['id' => 'balikpapan', 'name' => 'Balikpapan Choice', 'icon' => '🌊'],
        'manado' => ['id' => 'manado', 'name' => 'Manado Choice', 'icon' => '🐚'],
        'jayapura' => ['id' => 'jayapura', 'name' => 'Jayapura Abadi', 'icon' => '🌺'],
        'kupang' => ['id' => 'kupang', 'name' => 'Kupang Nusa', 'icon' => '☀️'],
    ];

    abort_unless(isset($stores[$store]), 404);

    return view('toko.home', ['store' => $stores[$store]]);
})->middleware(['auth', 'verified'])->name('toko.home');

Route::get('/produk/{slug}', function (Request $request, string $slug) {
    abort_unless($request->filled(['name', 'price', 'image']), 404);

    $name = $request->query('name');
    $nameText = strtolower($name);
    $category = $request->query('category', 'Produk pilihan');
    $categoryText = strtolower($category);
    $detail = match (true) {
        preg_match('/strawberry jam|jam|selai/', $nameText) => [
            'category' => 'Makanan & Minuman',
            'intro' => 'Selai stroberi manis dengan tekstur lembut, cocok dioleskan pada roti, pancake, atau dipadukan dengan dessert favorit.',
        ],
        preg_match('/tiramisu|choco|brownies|cake|cokelat|camilan|keripik|kue|granola|snack/', $nameText) => [
            'category' => 'Makanan & Minuman',
            'intro' => 'Camilan dengan rasa manis dan tekstur yang menggugah selera untuk menemani waktu santai atau menjadi sajian di rumah.',
        ],
        preg_match('/puff|makanan bayi|sereal|sembako|kopi|teh|sambal|buah|nasi|pempek|madu|minyak kelapa/', $nameText) => [
            'category' => 'Makanan & Minuman',
            'intro' => 'Pilihan makanan dan minuman untuk melengkapi persediaan rumah, disajikan dengan rasa yang akrab dan mudah dinikmati.',
        ],
        preg_match('/bottle|botol|dispenser|lunch box|mug|gelas/', $nameText) => [
            'category' => 'Kebutuhan Rumah',
            'intro' => 'Perlengkapan minum dan makan dengan bentuk praktis untuk dibawa ke kantor, sekolah, perjalanan, atau digunakan di rumah.',
        ],
        preg_match('/baby|bayi|gerber|puff peach|puff apple|bodysuits|baju tidur|perlengkapan mandi bayi/', $nameText) => [
            'category' => 'Perawatan Bayi',
            'intro' => 'Perlengkapan untuk si kecil dengan desain yang nyaman dan praktis, membantu kebutuhan harian bayi di rumah maupun saat bepergian.',
        ],
        preg_match('/serum|sunscreen|lotion|facial|lip balm|body scrub|face mist|sabun|skincare|parfum/', $nameText) => [
            'category' => 'Kecantikan',
            'intro' => 'Produk perawatan diri untuk melengkapi rutinitas harian, dengan tekstur dan penggunaan yang mudah diterapkan sesuai kebutuhan.',
        ],
        preg_match('/organizer|storage|rak|dapur|kitchen|sprei|handuk|lampu meja|vas|keranjang|kotak/', $nameText) => [
            'category' => 'Kebutuhan Rumah',
            'intro' => 'Perlengkapan rumah yang membantu menyimpan, menata, dan melengkapi ruangan agar aktivitas sehari-hari terasa lebih rapi.',
        ],
        preg_match('/sneaker|sepatu|jaket|kemeja|dress|batik|sandal|tas|kaos|topi|fashion|pakaian|tenun/', $nameText) => [
            'category' => 'Fashion',
            'intro' => 'Item fashion yang mudah dipadukan untuk gaya sehari-hari, dengan tampilan serbaguna untuk berbagai aktivitas.',
        ],
        preg_match('/smart tv|kamera|headset|keyboard|power bank|charger|gadget|wireless|bor|obeng|lampu led/', $nameText) => [
            'category' => 'Elektronik',
            'intro' => 'Perangkat fungsional untuk mendukung pekerjaan, hiburan, dan aktivitas harian dengan penggunaan yang praktis.',
        ],
        str_contains($categoryText, 'makanan') || str_contains($categoryText, 'kuliner') || str_contains($categoryText, 'minuman') => [
            'category' => $category,
            'intro' => 'Pilihan lezat untuk menemani momen sehari-hari bersama keluarga.',
        ],
        str_contains($categoryText, 'bayi') || str_contains($categoryText, 'anak') => [
            'category' => $category,
            'intro' => 'Dirancang untuk kebutuhan si kecil dengan bahan yang nyaman dan mudah digunakan.',
        ],
        str_contains($categoryText, 'kecantikan') || str_contains($categoryText, 'perawatan') || str_contains($categoryText, 'wewangian') => [
            'category' => $category,
            'intro' => 'Perawatan pilihan untuk membantu menjaga rutinitas harian tetap nyaman dan menyenangkan.',
        ],
        str_contains($categoryText, 'elektronik') || str_contains($categoryText, 'gadget') => [
            'category' => $category,
            'intro' => 'Perangkat praktis untuk mendukung aktivitas kerja, hiburan, dan kebutuhan digital sehari-hari.',
        ],
        str_contains($categoryText, 'rumah') || str_contains($categoryText, 'dapur') || str_contains($categoryText, 'dekorasi') => [
            'category' => $category,
            'intro' => 'Hadir untuk membuat ruang dan aktivitas rumah terasa lebih rapi, nyaman, dan efisien.',
        ],
        str_contains($categoryText, 'fashion') || str_contains($categoryText, 'pakaian') || str_contains($categoryText, 'aksesoris') => [
            'category' => $category,
            'intro' => 'Pelengkap gaya yang mudah dipadukan untuk aktivitas santai maupun momen spesial.',
        ],
        default => [
            'category' => $category,
            'intro' => 'Produk pilihan dengan fungsi yang praktis untuk menemani kebutuhan sehari-hari.',
        ],
    };

    return view('produk.show', [
        'product' => [
            'slug' => $slug,
            'name' => $name,
            'price' => $request->query('price'),
            'image' => $request->query('image'),
            'category' => $detail['category'],
            'store' => $request->query('store', 'Sarai Market'),
            'description' => $detail['intro'] . ' ' . $name . ' dari ' . $detail['category'] . ' ini dipilih untuk memberikan pengalaman belanja yang nyaman dan sesuai kebutuhan Anda.',
        ],
    ]);
})->name('product.show');

Route::get('/admin', function (Request $request) {
    $period = $request->query('periode', 'daily');
    abort_unless(in_array($period, ['daily', 'weekly', 'monthly'], true), 404);

    $today = now()->startOfDay();
    [$chartStart, $buckets] = match ($period) {
        'weekly' => [
            $today->copy()->startOfWeek()->subWeeks(11),
            collect(range(11, 0))->map(fn(int $weeksAgo) => $today->copy()->startOfWeek()->subWeeks($weeksAgo)),
        ],
        'monthly' => [
            $today->copy()->startOfMonth()->subMonths(11),
            collect(range(11, 0))->map(fn(int $monthsAgo) => $today->copy()->startOfMonth()->subMonths($monthsAgo)),
        ],
        default => [
            $today->copy()->subDays(13),
            collect(range(13, 0))->map(fn(int $daysAgo) => $today->copy()->subDays($daysAgo)),
        ],
    };

    $visitCounts = DB::table('page_visits')
        ->where('visited_at', '>=', $chartStart)
        ->get(['visited_at'])
        ->countBy(function (object $visit) use ($period) {
            $date = Carbon::parse($visit->visited_at);

            return match ($period) {
                'weekly' => $date->startOfWeek()->format('Y-m-d'),
                'monthly' => $date->format('Y-m'),
                default => $date->format('Y-m-d'),
            };
        });

    $usageChart = $buckets->map(function (Carbon $bucket) use ($period, $visitCounts) {
        $key = match ($period) {
            'weekly' => $bucket->format('Y-m-d'),
            'monthly' => $bucket->format('Y-m'),
            default => $bucket->format('Y-m-d'),
        };
        $label = match ($period) {
            'weekly' => $bucket->format('d/m'),
            'monthly' => $bucket->locale('id')->translatedFormat('M y'),
            default => $bucket->format('d/m'),
        };

        return ['label' => $label, 'total' => $visitCounts->get($key, 0)];
    });

    return view('admin.index', compact('period', 'usageChart'));
})->middleware(['auth', 'verified', 'admin'])->name('admin.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
