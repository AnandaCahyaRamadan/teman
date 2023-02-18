<style>
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>

@extends('admin.layouts.main')
@section('container')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<div class="container">
  <div>
    <h3 class="pt-4 fw-bold">Dashboard</h3>
  </div>
    <div class="row">
    <div class="col-md-4">
      <div class="card-counter danger">
        <i class="fa fa-comment"></i>
        <span class="count-numbers">{{ $commentcount }}</span>
        <span class="count-name">Komentar</span>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter success">
        <i class="fa fa-book"></i>
        <span class="count-numbers">{{ $logbookcount }}</span>
        <span class="count-name">Logbook</span>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{ Auth::user()->count() }}</span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card-counter secondary">
        <i class="fa fa-list"></i>
        <span class="count-numbers">{{ $pendaftarancount }}</span>
        <span class="count-name">Pendaftaran</span>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter primary">
        <i class="fa fa-clipboard"></i>
        <span class="count-numbers">{{ $postcount }}</span>
        <span class="count-name">Postingan</span>
      </div>
    </div>
</div>
