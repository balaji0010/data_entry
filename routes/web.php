    <?php

    use App\Http\Controllers\Auth\AuthController;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\FormUserController;


    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
    return view('dashboard'); // Create this blade file
})->middleware(['auth'])->name('dashboard');


// Fetch all form users
Route::get('/form_users', [FormUserController::class, 'index'])->name('form_users.index');

// Store a new user
Route::post('/form_users', [FormUserController::class, 'store'])->name('form_users.store');

// Delete a user
Route::delete('/form_users/{id}', [FormUserController::class, 'destroy'])->name('form_users.destroy');


use App\Http\Controllers\FormController\FormAController;

Route::prefix('form_a')->group(function () {
    Route::get('/', [FormAController::class, 'index']); // list
    Route::get('/{id}', [FormAController::class, 'show']); // single entry
    Route::post('/', [FormAController::class, 'store']); // create
    Route::put('/{id}', [FormAController::class, 'update']); // update
});
