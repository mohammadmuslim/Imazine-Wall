@extends('layouts.admin_app')
@section('title', 'Admin | Dashboard')
@section('content_head')


<div class="card">
    <div class="card-header">
        বিক্রয় করুন 
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label>দোকানের নাম</label>
                <select class="form-select" aria-label="দোকানের নাম">
                    <option selected>Select</option>
                    <option value="1">দোকানের 1</option>
                    <option value="2">দোকানের 2</option>
                    <option value="3">Imagin Wall</option>
                  </select>
            </div>
           
            <div class="mb-3 ">
                <label>আজকের তারিখ:</label>
                <input type="date" id="date" name="date">
            </div>

            <div class="mb-3 ">
                <label>প্রডাক্ট আইডি:</label>
                <input type="text" name="productid">
                <label> পিস:</label>
                <input type="text" name="pice">
                <label>টাকা:</label>
                <input type="text" name="taka">
            </div>
            <div class="mb-3 ">
                
            </div>
            <div class="mb-3 ">
                <label>প্রডাক্ট আইডি</label>
                <input type="text" name="productid">
            </div>
            <div class="mb-3 ">
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection