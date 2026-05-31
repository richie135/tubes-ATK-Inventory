use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/barang', [BarangController::class, 'index']); // [cite: 219]
Route::post('/barang', [BarangController::class, 'store']); // [cite: 191]