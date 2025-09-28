@include('partials.header') 


<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .background {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                          url("{{ asset('publicassets4/images/home-bg.jpg') }}" );
        height: 400px;
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .post {
        max-width: 600px; /* block width */
        margin: 30px auto; /* center block */
        text-align: left;  /* text inside left-aligned */
    }

    .post h2, .post h3 {
        margin-bottom: 10px;
    }

    .post p {
        margin: 5px 0;
    }

    .post p.posted-by {
        font-size: 0.8em;
        color: #555;
    }

    .post hr {
        border: none;
        border-top: 1px solid #ccc;
        margin: 15px 0;
        width: 100%; /* full width of post block, not page */
    }

    button {
        display: block;
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        margin: 20px auto;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<div class="background">
   <h1>Clean Blog</h1>
   <h2>A Blog Theme By Start Bootstrap</h2>
</div>

<div class="post">
    <h3><strong>Lorem ipsum</strong></h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi placeat voluptate cupiditate. Eaque neque temporibus nobis?</p>
    <p class="posted-by">posted by John Doe</p>
    <hr>
</div>

<div class="post">
    <h2><strong>Lorem ipsum 2</strong></h2>
    <p class="posted-by">posted by <strong>John Doe</strong> in another boring news</p>
    <hr>
</div>

<div class="post">
    <h3><strong>Lorem ipsum 3</strong></h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero deserunt cupiditate quis ducimus atque eveniet, laborum, maiores dignissimos eaque doloremque velit totam excepturi aperiam? In labore numquam illum aut dolor!</p>
    <p class="posted-by">posted by John Doe</p>
    <hr>
</div>

<div class="post">
    <h3><strong>Lorem ipsum 4</strong></h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    <p class="posted-by">posted by Missy Doe</p>
    <hr>
</div>

<div>
    <button>Older Posts -></button>
</div>

@include('partials.footer')
