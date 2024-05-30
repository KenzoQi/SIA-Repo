<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Define global variables for controllers
$registeredUserController = RegisterController::class;
$authenticatedSessionController = AuthenticatedSessionController::class;
$passwordResetLinkController = PasswordResetLinkController::class;
$newPasswordController = NewPasswordController::class;
$emailVerificationPromptController = EmailVerificationPromptController::class;
$emailVerificationNotificationController = EmailVerificationNotificationController::class;
$confirmablePasswordController = ConfirmablePasswordController::class;
$passwordController = PasswordController::class;
$verifyEmailController = VerifyEmailController::class;

Route::middleware('guest')->group(function () use (
    $registeredUserController,
    $authenticatedSessionController,
    $passwordResetLinkController,
    $newPasswordController
) {
    Route::get('register', [$registeredUserController, 'create'])
                ->name('register');

    Route::post('register', [$registeredUserController, 'store']);

    Route::get('login', [$authenticatedSessionController, 'create'])
                ->name('login');

    Route::post('login', [$authenticatedSessionController, 'store']);

    Route::get('forgot-password', [$passwordResetLinkController, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [$passwordResetLinkController, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [$newPasswordController, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [$newPasswordController, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () use (
    $emailVerificationPromptController,
    $verifyEmailController,
    $emailVerificationNotificationController,
    $confirmablePasswordController,
    $passwordController,
    $authenticatedSessionController
) {
    Route::get('verify-email', $emailVerificationPromptController)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', $verifyEmailController)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [$emailVerificationNotificationController, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [$confirmablePasswordController, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [$confirmablePasswordController, 'store']);

    Route::put('password', [$passwordController, 'update'])->name('password.update');

    Route::post('logout', [$authenticatedSessionController, 'destroy'])
                ->name('logout');
});
