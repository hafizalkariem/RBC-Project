@extends('layouts.app')



@section('fullwidth')

<x-hero-section />

<!-- Section: Telah Dipercaya Oleh -->
<x-client />

<x-tech-languange />

<x-service-card />

<x-developer />

<x-testimoni />

<x-contact />



@section('content')

<!-- Keunggulan -->
<section class="py-12">
    <div class="flex flex-wrap justify-center gap-8">
        <div class="text-center">
            <i class="fas fa-bolt text-3xl text-blue-400 mb-2"></i>
            <h3 class="font-bold">Cepat & Responsif</h3>
        </div>
        <div class="text-center">
            <i class="fas fa-user-shield text-3xl text-purple-400 mb-2"></i>
            <h3 class="font-bold">Profesional</h3>
        </div>
        <div class="text-center">
            <i class="fas fa-headset text-3xl text-cyan-400 mb-2"></i>
            <h3 class="font-bold">Support 24 Jam</h3>
        </div>
    </div>
</section>



@endsection