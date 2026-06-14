<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/{slug}', \App\Livewire\ProposalComponent::class);

