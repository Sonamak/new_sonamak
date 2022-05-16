@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid">
   <div class="card mt-4">
      <x-admin.feature-component></x-admin.feature-component>
   </div>
   <div class="card mt-4">
      <x-admin.blog-component></x-admin.blog-component>
   </div>
   <div class="card mt-4">
      <x-admin.about-component></x-admin.about-component>
   </div>
   <div class="card mt-4">
      <x-admin.distination-component></x-admin.distination-component>
   </div>
   <div class="card mt-4">
      <x-admin.contact-component></x-admin.about-component>
   </div>
   <div class="card mt-4">
      <x-admin.search-tour-component></x-admin.search-tour-component>
   </div>
   <div class="card mt-4">
      <x-admin.destiantion-video></x-admin.destiantion-video>
   </div>
</div>
@endsection