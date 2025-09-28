@include('partials.header')

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .background {
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("{{ asset('publicassets4/images/blog-image.jpg') }}");
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

    .content {
        max-width: 800px; /* ограничена ширина за текст */
        margin: 30px auto; /* центрирање */
        text-align: left;  /* текстот почнува од левата страна */
        line-height: 1.6;
        padding: 0 15px; /* мали маргини за мобилен изглед */
    }

    .content h2 {
        margin-top: 40px;
        margin-bottom: 15px;
    }

    .content img {
        max-width: 100%;
        display: block;
        margin: 20px auto;
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
   <h1>Man must explore</h1>
   <h2>Problem might look mighty small from 150 miles up</h2>
</div>

<div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil accusantium doloremque iure quasi ea deserunt recusandae enim repudiandae voluptates expedita rem obcaecati, impedit quam quia soluta aut culpa est ipsa eos explicabo eius? Fugit ad rem esse aliquid inventore qui, tempora assumenda non maiores quod minus ex deleniti commodi.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil accusantium doloremque iure quasi ea deserunt recusandae enim repudiandae voluptates expedita rem obcaecati, impedit quam quia soluta aut culpa est ipsa eos explicabo eius?</p>

    <h2>The final frontier</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi nihil accusantium doloremque iure quasi ea deserunt recusandae enim repudiandae voluptates expedita rem obcaecati, impedit quam quia soluta aut culpa est ipsa eos explicabo eius?</p>

    <h2>Reaching for the stars</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil corrupti provident labore amet excepturi expedita voluptatibus officia praesentium nulla delectus quia quae, consectetur dolorem magni error...</p>

    <img src="{{ asset('publicassets4/images/blog-image.jpg') }}" alt="Blog Image">

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, facilis molestiae. Alias at deserunt possimus, ea ut quidem reiciendis sequi cupiditate totam aut, porro pariatur, nemo nostrum accusamus earum nam.</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium suscipit quas neque veritatis similique sequi eveniet animi earum fugiat...</p>
</div>

@include('partials.footer')
