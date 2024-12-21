@extends('layouts.master')
@section('content')
<div class="container-fluid ">
    <div class="d-flex justify-content-center mt-5">
        <div class="d-flex gap-3 flex-column">
            <h3>Contact Form</h3>
            <!-- Display success message -->
             @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
             @endif
            <form method="post" action="{{route('contact.store')}}" class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    @error('name')
                        <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    @error('message')
                        <div style="color: red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection