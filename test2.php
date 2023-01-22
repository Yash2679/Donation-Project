<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="form-group">
            <input class="form-control" type="text" name="adhaar" id="adhaar" placeholder="Adhaar Number" >
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="name" id="username" placeholder="Name" >
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="Address" id="Address" placeholder="Address" >
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" >
        </div>

    </div>
</body>
<script>
$(document).ready(function(){
    $("#adhaar").focusout(function() {
    let data=fetch('http://127.0.0.1:3000/adhaar_details').then((res)=>res.json())
    .then((data)=>{
    let toCheck= document.getElementById('adhaar').value;
     let index= data.data.findIndex((val)=>val.Adhaar_No==toCheck)
    console.log(index);
    document.getElementById('username').value=data.data[index]["Name"];
    document.getElementById('Address').value=data.data[index]["Address"];
    document.getElementById('phone').value=data.data[index]["Phone_no"];
    
    });
});
});
</script>
</html>