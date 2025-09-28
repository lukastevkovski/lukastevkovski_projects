

@include('partials.header') 
@section('title', 'About Me')
<style>

    body{
        margin:0;
    }
       .background{
        
       background-image:        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
         url("{{ asset('publicassets4/images/about-bg.jpg') }}" );
       text-align:center;
       height:400px;
       background-size: cover;
        width:100%;
        display: flex;
         align-items: center;
       justify-content: center;
     flex-direction: column;

    }
    .background h1,h2{
        color:white;

    }
    .txt{
        width:50%;
        text-align:center;
        margin: 0 auto;

    }
</style>


     <div class="background">
       <h1>About Me</h1>
      <h2>This is what I do</h2>
     </div>
     <div class="txt">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, alias atque? Eos, rerum, corporis enim suscipit ipsa neque minima dolore perferendis reiciendis sequi facilis laudantium reprehenderit corrupti deserunt officiis sunt doloribus cumque et fugit! Inventore, hic. Quod adipisci ullam quia?</p>
     </div>
     <div class="txt">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, alias atque? Eos, rerum, corporis enim suscipit ipsa neque minima dolore perferendis reiciendis sequi facilis laudantium reprehenderit corrupti deserunt officiis sunt doloribus cumque et fugit! Inventore, hic. Quod adipisci ullam quia?</p>
     </div>
     <div class="txt">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, alias atque? Eos, rerum, corporis enim suscipit ipsa neque minima dolore perferendis reiciendis sequi facilis laudantium reprehenderit corrupti deserunt officiis sunt doloribus cumque et fugit! Inventore, hic. Quod adipisci ullam quia?</p>
     </div>
    
@include('partials.footer')