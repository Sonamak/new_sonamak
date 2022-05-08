@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid">
   <div class="card ">
       <x-admin.about-info-component></x-admin.about-info-component>
   </div>
   <div class="card mt-4">
        <x-admin.terms-component></x-admin.terms-component>
   </div>
   <div class="card mt-4">
        <x-admin.privacy-component></x-admin.privacy-component>
   </div>
   <div class="card mt-4">
        <x-admin.faq-component></x-admin.faq-component>
   </div>
</div>
@endsection