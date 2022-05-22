@extends('layout')

@section('content')
<div id="app">
    <header class=" flex flex-col w-full text-white  bg-blue-700 items-center pt-12 ">
         <h1 class="text-white text-2xl font-bold" >LET'S TALK!</h1>
         <input id="username" type="text" class="my-4 p-2 mx-4 w-2/3 rounded-md focus:outline-none cursor-text text-black" placeholder="Enter Name"/>
    </header>
    <main class="w-full container p-12 mx-auto items-center flex flex-col" id="message">
      
    </main>
    <footer class=" w-full absolute bottom-0">  
       <form id="message_form" class="h-full flex flex-row">
        <div class="flex flex-col w-full">
      
         <input type="text" name="message" id="message_input" class="focus:outline-none p-2 bg-gray-100 border-none h-full w-full" placeholder="Write a message"/>
       
        </div>
         <div class="flex flex-row ">
            <button id="message_send" type="submit" class="bg-purple-800 text-white w-full h-full">Send Message</button>
         </div> 
      </form>
    </footer>
</div>

@stop