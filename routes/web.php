    <?php

    use App\Http\Controllers\PortfolioController;
    use App\Http\Controllers\AdminController;
    use App\Http\Middleware\AdminAuth;
    use Illuminate\Support\Facades\Route;

    // Public Landing Page
    Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

    // Secure Admin Panel Credentials Login
    Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login']);
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Protected Admin Panel Group
    Route::middleware([AdminAuth::class])->prefix('admin')->name('admin.')->group(function () {
        // Dashboard (Main Overview & CRUD forms)
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // Profile CRUD Update
        Route::get('/profile', fn() => redirect()->route('admin.dashboard'))->name('profile.redirect');
        Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');

        // Projects CRUD
        Route::get('/projects', fn() => redirect()->route('admin.dashboard'));
        Route::post('/projects', [AdminController::class, 'projectStore'])->name('projects.store');
        Route::get('/projects/{project}', fn() => redirect()->route('admin.dashboard'));
        Route::put('/projects/{project}', [AdminController::class, 'projectUpdate'])->name('projects.update');
        Route::patch('/projects/{project}', [AdminController::class, 'projectUpdate']);
        Route::delete('/projects/{project}', [AdminController::class, 'projectDestroy'])->name('projects.destroy');

        // Skills CRUD
        Route::get('/skills', fn() => redirect()->route('admin.dashboard'));
        Route::post('/skills', [AdminController::class, 'skillStore'])->name('skills.store');
        Route::get('/skills/{skill}', fn() => redirect()->route('admin.dashboard'));
        Route::put('/skills/{skill}', [AdminController::class, 'skillUpdate'])->name('skills.update');
        Route::patch('/skills/{skill}', [AdminController::class, 'skillUpdate']);
        Route::delete('/skills/{skill}', [AdminController::class, 'skillDestroy'])->name('skills.destroy');
    });
