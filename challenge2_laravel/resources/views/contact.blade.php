

@include('partials.header') 
@section('title', 'About Me')
<style>

    body{
        margin:0;
    }
    .background{
        
       background-image:        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
         url("{{ asset('publicassets4/images/contact-bg.jpg') }}" );
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
    .contact-form {
  max-width: 500px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.contact-form input,
.contact-form textarea {
  border: none;
  border-bottom: 2px solid #aaa; /* only underline */
  padding: 8px 0;
  font-size: 16px;
  outline: none;
  transition: border-color 0.3s;
  background: transparent;
}

.contact-form input::placeholder,
.contact-form textarea::placeholder {
  color: #aaa;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-bottom-color: #007BFF; /* blue underline on focus */
}

.contact-form button {
  background-color: #007BFF;
  color: white;
  border: none;
  padding: 12px;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.3s;
}

.contact-form button:hover {
  background-color: #0056b3;
}
</style>


     <div class="background">
       <h1 >Contact me</h1>
      <h2>Have question? I have answers!</h2>
     </div>
     <form class="contact-form">
  <input type="text" name="name" placeholder="Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="text" name="address" placeholder="Address">
  <input type="tel" name="phone" placeholder="Phone">
  <textarea name="message" placeholder="Message" rows="5" required></textarea>
  <button type="submit">Send</button>
</form>
    
@include('partials.footer')