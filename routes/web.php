    <?php

    use App\Http\Controllers\Auth\AuthController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
    return view('dashboard'); // Create this blade file
})->middleware(['auth'])->name('dashboard');