@extends('layouts.app')

@section('content')
    
    <!-- carry for props and emit -->
    <chooseyouravatar :messages="messages" v-on:messagesent="addMessage" v-on:setUserx="setUser" :user="user"  />




@endsection
