<?php

use App\Http\Controllers\MailController;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get("/", function () {
    return view("layouts.main");
})->name("home");

Route::get("/contact", function () {
    return view("layouts.contact");
})->name("contact");

Route::get("/testroute", function () {
    $name = "David";

    Mail::to("davidkizajr@outlook.fr")->send(new MyTestEmail($name));
});

Route::post("/send-mail", [MailController::class, "sendMail"])->name(
    "send-mail",
);

Route::get("/contactsuccess", function () {
    return view("layouts.contactsuccess");
})->name("contactsuccess");

if (env("APP_ENV") === "production") {
    URL::forceScheme("https");
}
