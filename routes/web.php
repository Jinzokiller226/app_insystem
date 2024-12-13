<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserUpdate;
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::view('inventory', 'inventory')
    ->middleware(['auth', 'verified'])
    ->name('inventory');

    Route::view('pointofsales', 'pointofsales')
    ->middleware(['auth', 'verified'])
    ->name('pointofsales');

    Route::view('patientinfosystem', 'patientinfosystem')
    ->middleware(['auth', 'verified'])
    ->name('patientinfosystem');
    
    
    
    Route::view('usermanagement', 'usermanagement')
    ->middleware(['auth', 'verified'])
    ->name('usermanagement');

    Route::view('rolesmanagement', 'rolesmanagement')
    ->middleware(['auth', 'verified'])
    ->name('rolesmanagement');

    Route::view('branchmanagement', 'branch')
    ->middleware(['auth', 'verified'])
    ->name('branch');

    Route::view('categorymanagement', 'categorymanagement')
    ->middleware(['auth', 'verified'])
    ->name('categorymanagement');

  

require __DIR__.'/auth.php';
