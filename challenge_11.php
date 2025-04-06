<?php 
//First exc
$br = "<br>";
$name = "Kathrin";
if($name == "Kathrin"){
    echo  "Hello Kathrin";
} else{
    echo "Nice name";
}

echo $br;
echo $br;

$rating = 4; 

if ($rating >= 1 && $rating <= 10) {
    echo "Thank you for rating";
} else {
    echo "Invalid rating, only numbers between 1 and 10.";
}

echo $br;
echo $br;
echo $br;
echo $br;

//Second exc


$hour = (int)date("H");
$currentTime = date("h:i A");
echo "Current time: $currentTime<br>";


if ($hour < 12) {
    echo "Good morning Kathrin";
} elseif ($hour < 19) {
    echo "Good afternoon Kathrin";
} else {
    echo "Good evening Kathrin";
}

echo $br;
echo $br;
echo $br;
echo $br;
$rated = false;
if ($rating >= 1 && $rating <= 10 && $rated== true ) {
    echo "You already voted";
} else {
    echo "Thanks for voting";
}
echo $br;
echo $br;

if (is_int($rating)) {
    echo "$rating is an integer.";
} else {
    echo "$rating is NOT an integer.";
}

//third exc
echo $br;
echo $br;
echo $br;
echo $br;
echo $br;



 


$voters = [
    "Alice" => "true,8",
    "Bob" => "false,10",
    "Charlie" => "true,11",
    "Diana" => "false,7",
    "Eli" => "false,4",
    "Frank" => "true,6",
    "Grace" => "false,0",
    "Hank" => "true,3",
    "Ivy" => "false,5",
    "Jack" => "true,2"
];


$hour = (int)date("H");


foreach ($voters as $name => $data) {
    list($hasVoted, $rating) = explode(",", $data);
    $rating = (int)$rating;

  
    if ($hour < 12) {
        echo "Good morning $name<br>";
    } elseif ($hour < 19) {
        echo "Good afternoon $name<br>";
    } else {
        echo "Good evening $name<br>";
    }

    if ($rating >= 1 && $rating <= 10) {
        if ($hasVoted === "true") {
            echo "You already voted with a $rating.<br><br>";
        } else {
            echo "Thanks for voting with a $rating.<br><br>";
        }
    } else {
        echo "Invalid rating, only numbers between 1 and 10.<br><br>";
    }
}
