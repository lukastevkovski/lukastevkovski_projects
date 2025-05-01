<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
      
      body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
    
        }
       
        .center input {
            display:flex;
            justify-content:center;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .center button {
            width: 100%;
            padding: 12px;
            background-color:rgb(0, 0, 0);
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

    
    </style>
</head>
<body>

<form method="POST" action="register.php" class="center">
    <h2 style="text-align:center;">User Registration</h2>
    <input type="text" name="firstName" placeholder="First Name" required>
    <input type="text" name="lastName" placeholder="Last Name" required>
    <input type="text" name="userName" placeholder="Username" required>
    <input type="text" name="telephoneNumber" placeholder="Telephone" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

</body>
</html>
